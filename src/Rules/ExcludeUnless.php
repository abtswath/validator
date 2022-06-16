<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;

class ExcludeUnless implements Rule {

    /**
     * @param string $property
     * @param mixed $value
     * @param \Abtswath\Validator\Attributes\ExcludeUnless $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        $otherProperty = $attribute->getAnotherField();
        $values = (array)$attribute->getValue();
        $otherValue = $validator->getValue($otherProperty);
        return in_array($otherValue, $values, is_bool($otherValue) || is_null($otherValue));
    }
}
