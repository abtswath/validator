<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class DateFormat extends MessageProvider {

    private string $format;

    //TODO. default message...
    public function __construct(string $format, string $message = '') {
        parent::__construct($message);
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getFormat(): string {
        return $this->format;
    }

}
