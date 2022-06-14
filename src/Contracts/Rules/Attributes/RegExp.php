<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class RegExp extends MessageProvider {

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
