<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Different extends MessageProvider {

    private string $field;

    //TODO. default message...
    public function __construct(string $field, string $message = '') {
        parent::__construct($message);
        $this->field = $field;
    }

    /**
     * @return string
     */
    public function getField(): string {
        return $this->field;
    }
}
