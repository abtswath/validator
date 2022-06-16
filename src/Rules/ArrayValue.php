<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Attributes\ArrayValue as ArrayAttribute;
use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;

class ArrayValue implements Rule {

    /**
     * @param string $property
     * @param mixed $value
     * @param ArrayAttribute $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        if (!is_array($value)) {
            return false;
        }
        $keys = $attribute->getKeys();
        if (empty($keys)) {
            return true;
        }
        return empty(array_diff_key($value, array_fill_keys($keys, '')));
    }
}
