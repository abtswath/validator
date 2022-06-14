<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Abtswath\Validator\Contracts\Rules\Traits\AnotherField;
use Abtswath\Validator\Contracts\Rules\Traits\Value;
use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class AcceptedIf extends Accepted {

    use AnotherField, Value;

    //TODO. default message...
    public function __construct(string $anotherField, mixed $value, string $message = '') {
        parent::__construct($message);
        $this->anotherField = $anotherField;
        $this->value = $value;
    }

}
