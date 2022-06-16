<?php

namespace Abtswath\Validator\Attributes;

use Abtswath\Validator\Contracts\Attribute as AttributeContract;
use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class StartsWith extends MessageProvider implements AttributeContract {

    private array $value;

    //TODO. default message...
    public function __construct(array $value, string $message = '') {
        parent::__construct($message);
        $this->value = $value;
    }

    /**
     * @return array
     */
    public function getValue(): array {
        return $this->value;
    }
}
