<?php

namespace Abtswath\Validator\Attributes;

use Abtswath\Validator\Contracts\Attribute as AttributeContract;
use Abtswath\Validator\MessageProvider;
use Abtswath\Validator\Traits\AnotherField;
use Abtswath\Validator\Traits\Value;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class RequiredIf extends MessageProvider implements AttributeContract {

    use AnotherField, Value;

    //TODO. default message...
    public function __construct(string $anotherField, mixed $value, string $message = '') {
        parent::__construct($message);
        $this->anotherField = $anotherField;
        $this->value = $value;
    }
}
