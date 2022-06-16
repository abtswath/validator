<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Traits\GetSize;
use Abtswath\Validator\Validator;

class Between implements Rule {
    use GetSize;

    /**
     * @param string $property
     * @param mixed $value
     * @param \Abtswath\Validator\Attributes\Between $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        $size = self::getSize($value);
        return $size >= $attribute->getMin() && $size <= $attribute->getMax();
    }
}
