<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Enum extends MessageProvider {

    private string $enum;

    //TODO. default message...
    public function __construct(string $enum, string $message = '') {
        parent::__construct($message);
        $this->enum = $enum;
    }

    /**
     * @return string
     */
    public function getEnum(): string {
        return $this->enum;
    }
}
