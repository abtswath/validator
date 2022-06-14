<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Exclude extends MessageProvider {

    //TODO. default message...
    public function __construct(string $message = '') {
        parent::__construct($message);
    }
}
