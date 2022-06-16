<?php

namespace Abtswath\Validator\Attributes;

use Abtswath\Validator\Traits\AnotherField;
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
