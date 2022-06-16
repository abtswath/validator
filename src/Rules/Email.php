<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validations\FilterEmailValidation;
use Abtswath\Validator\Validator;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\Extra\SpoofCheckValidation;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;
use Egulias\EmailValidator\Validation\NoRFCWarningsValidation;
use Egulias\EmailValidator\Validation\RFCValidation;

class Email implements Rule {

    /**
     * @param string $property
     * @param mixed $value
     * @param \Abtswath\Validator\Attributes\Email $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        if (!is_string($value)) {
            return false;
        }
        $validations = [];
        $attribute->isRfc() && $validations[] = new RFCValidation;
        $attribute->isStrict() && $validations[] = new NoRFCWarningsValidation;
        $attribute->isDns() && $validations[] = new DNSCheckValidation;
        $attribute->isSpoof() && $validations[] = new SpoofCheckValidation;
        $attribute->isFilter() && $validations[] = new FilterEmailValidation;
        $attribute->isFilterUnicode() && $validations[] = new FilterEmailValidation;

        if (empty($validations)) {
            $validations[] = new RFCValidation;
        }

        return (new EmailValidator)->isValid($value, new MultipleValidationWithAnd($validations));
    }
}
