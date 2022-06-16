<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Attributes\AcceptedIf as AcceptedIfAttribute;
use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;

class AcceptedIf implements Rule {

    /**
     * @param string $property
     * @param mixed $value
     * @param AcceptedIfAttribute $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        $otherProperty = $attribute->getAnotherField();
        $values = (array)$attribute->getValue();
        $otherValue = $validator->getValue($otherProperty);
        if (in_array($otherValue, $values, is_bool($otherValue) || is_null($otherValue))) {
            return Accepted::validate($property, $value, $attribute, $validator);
        }
        return true;
    }
}
