<?php

namespace Abtswath\Validator\Attributes;

use Abtswath\Validator\Contracts\Attribute as AttributeContract;
use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class After extends MessageProvider implements AttributeContract {

    private string $date;

    public function __construct(string $date, string $message = '') {
        parent::__construct($message);
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getValue(): string {
        return $this->date;
    }
}
