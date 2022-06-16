<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Traits\GetSize;
use Abtswath\Validator\Traits\GetType;
use Abtswath\Validator\Validator;

class Gt implements Rule {
    use GetSize, GetType;

    /**
     * @param string $property
     * @param mixed $value
     * @param \Abtswath\Validator\Attributes\Gt $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        $otherValue = $validator->getValue($attribute->getAnotherField());
        if (is_null($otherValue)) {
            return true;
        }

        if (!self::isSameType($value, $otherValue)) {
            return false;
        }

        return self::getSize($value) > self::getSize($otherValue);
    }
}
