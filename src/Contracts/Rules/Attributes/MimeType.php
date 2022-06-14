<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MimeType extends MessageProvider {

    private array|string $type;

    public function __construct(array|string $type, string $message = '') {
        parent::__construct($message);
        $this->type = $type;
    }

    /**
     * @return array|string
     */
    public function getType(): array|string {
        return $this->type;
    }

}
