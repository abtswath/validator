<?php

namespace Abtswath\Validator\Attributes;

use Abtswath\Validator\Contracts\Attribute as AttributeContract;
use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MimeType extends MessageProvider implements AttributeContract {

    private array $mimeTypes;

    public function __construct(array|string $mimeTypes, string $message = '') {
        parent::__construct($message);
        $this->mimeTypes = (array)$mimeTypes;
    }

    /**
     * @return array
     */
    public function getMimeTypes(): array {
        return $this->mimeTypes;
    }

}
