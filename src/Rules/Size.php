<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Traits\GetSize;
use Abtswath\Validator\Validator;

class Size implements Rule {
    use GetSize;

    /**
     * @param string $property
     * @param mixed $value
     * @param \Abtswath\Validator\Attributes\Size $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        return self::getSize($value) === $attribute->getValue();
    }
}
