<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;

class In implements Rule {

    /**
     * @param string $property
     * @param mixed $value
     * @param \Abtswath\Validator\Attributes\In $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        if (is_array($value)) {
            foreach ($value as $item) {
                if (is_array($item)) {
                    return false;
                }
            }
            return count(array_diff($value, $attribute->getValue())) === 0;
        }
        return in_array($value, $attribute->getValue());
    }
}
