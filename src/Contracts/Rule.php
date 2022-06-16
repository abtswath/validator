<?php

namespace Abtswath\Validator\Contracts;

use Abtswath\Validator\Validator;

interface Rule {

    /**
     * @param string $property
     * @param mixed $value
     * @param Attribute $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool;
}
