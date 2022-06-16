<?php

namespace Abtswath\Validator\Attributes;

use Abtswath\Validator\Contracts\Attribute as AttributeContract;
use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Extension extends MessageProvider implements AttributeContract {

    private array $extensions;

    public function __construct(array|string $extensions, string $message = '') {
        parent::__construct($message);
        $this->extensions = (array)$extensions;
    }

    /**
     * @return array
     */
    public function getExtensions(): array {
        return $this->extensions;
    }

}
