<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;

class Image implements Rule {

    /**
     * @param string $property
     * @param mixed $value
     * @param \Abtswath\Validator\Attributes\Image $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        return MimeType::validate($property, $value, $attribute, $validator);
    }
}
