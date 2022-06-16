<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;

class Accepted implements Rule {

    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        $acceptable = [true, 1, 'yes', 'on', '1', 'true'];
        return Required::validate($property, $value, $attribute, $validator)
            && in_array($value, $acceptable, true);
    }
}
