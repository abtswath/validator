<?php

namespace Abtswath\Validator\Attributes;

use Abtswath\Validator\Contracts\Attribute as AttributeContract;
use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MultipleOf extends MessageProvider implements AttributeContract {

    private int|string $value;

    //TODO. default message...
    public function __construct(int|string $value, string $message = '') {
        parent::__construct($message);
        $this->value = $value;
    }

    /**
     * @return int|string
     */
    public function getValue(): int|string {
        return $this->value;
    }
}
