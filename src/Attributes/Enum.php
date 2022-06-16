<?php

namespace Abtswath\Validator\Attributes;

use Abtswath\Validator\Contracts\Attribute as AttributeContract;
use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Enum extends MessageProvider implements AttributeContract {

    private array $enum;

    //TODO. default message...
    public function __construct(array $enum, string $message = '') {
        parent::__construct($message);
        $this->enum = $enum;
    }

    /**
     * @return array
     */
    public function getEnum(): array {
        return $this->enum;
    }
}
