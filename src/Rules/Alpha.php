<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Attributes\Alpha as AlphaAttribute;
use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;

class Alpha implements Rule {

    /**
     * @param string $property
     * @param mixed $value
     * @param AlphaAttribute $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        return is_string($value) && preg_match('/^[\pL\pM]+$/u', $value);
    }
}
