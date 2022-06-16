<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;
use \Abtswath\Validator\Traits\File;
use Exception;

class Extension implements Rule {
    use File;

    /**
     * @param string $property
     * @param mixed $value
     * @param \Abtswath\Validator\Attributes\Extension $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        try {
            $file = self::create($value);
        } catch (Exception) {
            return false;
        }
        if (!self::isValid($file)) {
            return false;
        }

        return in_array($file->getExtension(), $attribute->getExtensions());
    }
}
