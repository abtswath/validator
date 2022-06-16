<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Attributes\After as AfterAttribute;
use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Traits\DateCompare;
use Abtswath\Validator\Validator;

class After implements Rule {

    use DateCompare;

    /**
     * @param string $property
     * @param mixed $value
     * @param AfterAttribute $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        return self::compare($value, $attribute->getValue(), '>');
    }
}
