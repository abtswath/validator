<?php

namespace Abtswath\Validator\Attributes;

use Abtswath\Validator\Contracts\Attribute as AttributeContract;
use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Size extends MessageProvider implements AttributeContract {

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
