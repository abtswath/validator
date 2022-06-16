<?php

namespace Abtswath\Validator\Attributes;

use Abtswath\Validator\Contracts\Attribute as AttributeContract;
use Abtswath\Validator\MessageProvider;
use Abtswath\Validator\Traits\AnotherField;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class InArray extends MessageProvider implements AttributeContract {
    use AnotherField;

    public function __construct(string $anotherField, string $message = '') {
        parent::__construct($message);
        $this->anotherField = $anotherField;
    }
}
