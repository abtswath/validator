<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;
use Exception;

class File implements Rule {
    use \Abtswath\Validator\Traits\File;

    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        try {
            return self::isValid(self::create($value));
        } catch (Exception) {
            return false;
        }
    }
}
