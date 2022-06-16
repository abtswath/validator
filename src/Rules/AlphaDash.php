<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;

class AlphaDash implements Rule {

    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        if (!is_string($value) && !is_numeric($value)) {
            return false;
        }
        return preg_match('/^[\pL\pM\pN_-]+$/u', $value) > 0;
    }
}
