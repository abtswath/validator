<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;

class Declined implements Rule {

    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        $acceptable = ['no', 'off', '0', 0, false, 'false'];
        return Required::validate($property, $value, $attribute, $validator) && in_array($value, $acceptable, true);
    }
}
