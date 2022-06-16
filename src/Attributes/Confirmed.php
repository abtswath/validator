<?php

namespace Abtswath\Validator\Attributes;

use Abtswath\Validator\Contracts\Attribute as AttributeContract;
use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Confirmed extends MessageProvider implements AttributeContract {

    //TODO. default message...
    public function __construct(string $message = '') {
        parent::__construct($message);
    }
}
