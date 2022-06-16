<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;

class Lt implements Rule {

    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        return !Gte::validate($property, $value, $attribute, $validator);
    }
}
