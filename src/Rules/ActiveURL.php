<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;
use Exception;

class ActiveURL implements Rule {

    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        if (!is_string($value)) {
            return false;
        }
        if ($url = parse_url($value, PHP_URL_HOST)) {
            try {
                return count(dns_get_record($url . '.', DNS_A | DNS_AAAA)) > 0;
            } catch (Exception) {
                return false;
            }
        }
        return false;
    }
}
