<?php

namespace Abtswath\Validator\Attributes;

use Abtswath\Validator\Contracts\Attribute as AttributeContract;
use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class ArrayValue extends MessageProvider implements AttributeContract {

    private array $keys;

    //TODO. default message...
    public function __construct(array $keys = [], string $message = '') {
        parent::__construct($message);
        $this->keys = $keys;
    }

    /**
     * @return array
     */
    public function getKeys(): array {
        return $this->keys;
    }
}
