<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Abtswath\Validator\Contracts\Rules\Traits\AnotherField;
use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class ExcludeWithout extends Exclude {

    use AnotherField;

    //TODO. default message...
    public function __construct(string $anotherField, string $message = '') {
        parent::__construct($message);
        $this->anotherField = $anotherField;
    }

}
