<?php

namespace Abtswath\Validator\Attributes;

use Abtswath\Validator\Contracts\Attribute as AttributeContract;
use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class RegExp extends MessageProvider implements AttributeContract {

    private string $pattern;

    //TODO. default message...
    public function __construct(string $pattern, string $message = '') {
        parent::__construct($message);
        $this->pattern = $pattern;
    }

    /**
     * @return string
     */
    public function getPattern(): string {
        return $this->pattern;
    }
}
