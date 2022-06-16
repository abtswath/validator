<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Attributes\AfterOrEqual as AfterOrEqualAttribute;
use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Traits\DateCompare;
use Abtswath\Validator\Validator;

class AfterOrEqual implements Rule {
    use DateCompare;

    /**
     * @param string $property
     * @param mixed $value
     * @param AfterOrEqualAttribute $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        self::compare($value, $attribute->getValue(), '>=');
        return true;
    }
}
