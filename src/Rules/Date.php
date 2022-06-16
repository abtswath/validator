<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Traits\DateCompare;
use Abtswath\Validator\Validator;
use Exception;

class Date implements Rule {
    use DateCompare;

    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        try {
            return self::dateCreate($value) != false;
        } catch (Exception) {
            return false;
        }
    }
}
