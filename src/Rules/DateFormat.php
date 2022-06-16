<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;
use DateTime;

class DateFormat implements Rule {

    /**
     * @param string $property
     * @param mixed $value
     * @param \Abtswath\Validator\Attributes\DateFormat $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        if (!is_string($value) && !is_numeric($value)) {
            return false;
        }
        $formats = $attribute->getFormat();
        foreach ($formats as $format) {
            $date = DateTime::createFromFormat('!' . $format, $value);

            if ($date && $date->format($format) == $value) {
                return true;
            }
        }
        return false;
    }
}
