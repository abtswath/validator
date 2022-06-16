<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Traits\DateCompare;
use Abtswath\Validator\Validator;

class BeforeOrEqual implements Rule {
    use DateCompare;

    /**
     * @param string $property
     * @param mixed $value
     * @param \Abtswath\Validator\Attributes\BeforeOrEqual $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        return self::compare($value, $attribute->getValue(), '<=');
    }
}
