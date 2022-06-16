<?php

namespace Abtswath\Validator\Attributes;

use Abtswath\Validator\Contracts\Attribute as AttributeContract;
use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class DateFormat extends MessageProvider implements AttributeContract {

    private array $format;

    //TODO. default message...
    public function __construct(string|array $format, string $message = '') {
        parent::__construct($message);
        $this->format = (array)$format;
    }

    /**
     * @return array
     */
    public function getFormat(): array {
        return $this->format;
    }

}
