<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;

class IPv4 implements Rule {

    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        return filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false;
    }
}
