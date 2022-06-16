<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;

class DeclinedIf implements Rule {

    /**
     * @param string $property
     * @param mixed $value
     * @param \Abtswath\Validator\Attributes\DeclinedIf $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        $otherProperty = $attribute->getAnotherField();
        $values = (array)$attribute->getValue();
        $otherValue = $validator->getValue($otherProperty);
        if (in_array($otherValue, $values, is_bool($otherValue) || is_null($otherValue))) {
            return Declined::validate($property, $value, $attribute, $validator);
        }
        return true;
    }
}
