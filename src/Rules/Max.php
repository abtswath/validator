<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Traits\GetSize;
use Abtswath\Validator\Validator;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Max implements Rule {
    use GetSize;

    /**
     * @param string $property
     * @param mixed $value
     * @param \Abtswath\Validator\Attributes\Max $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        if ($value instanceof UploadedFile && !$value->isValid()) {
            return false;
        }

        return self::getSize($value) <= $attribute->getValue();
    }
}
