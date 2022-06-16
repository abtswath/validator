<?php

namespace Abtswath\Validator\Attributes;

use Abtswath\Validator\Contracts\Attribute as AttributeContract;
use Abtswath\Validator\MessageProvider;
use Attribute;
use Symfony\Component\Mime\MimeTypes;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Image extends MimeType {

    protected array $extensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp'];

    //TODO. default message...
    public function __construct(string $message = '') {
        parent::__construct($this->mimeTypes(), $message);
    }

    protected function mimeTypes(): array {
        $mimeTypes = [];
        $mimeType = new MimeTypes();
        foreach ($this->extensions as $extension) {
            array_merge($mimeTypes, $mimeType->getMimeTypes($extension));
        }
        return $mimeTypes;
    }
}
