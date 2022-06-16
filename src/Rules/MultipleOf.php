<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;

class MultipleOf implements Rule {

    /**
     * @param string $property
     * @param mixed $value
     * @param \Abtswath\Validator\Attributes\MultipleOf $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        $num = $attribute->getValue();
        if (!is_numeric($value) || !is_numeric($num)) {
            return false;
        }
        if ((float)$num === 0.0) {
            return false;
        }
        return bcmod($value, $num, 16) === '0.0000000000000000';
    }
}
