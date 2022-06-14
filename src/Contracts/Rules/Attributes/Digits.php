<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Digits extends MessageProvider {

    private int $value;

    //TODO. default message...
    public function __construct(int $value, string $message = '') {
        parent::__construct($message);
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int {
        return $this->value;
    }
}
