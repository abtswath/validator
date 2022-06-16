<?php

namespace Abtswath\Validator\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class RequiredWith extends Required {

    protected array $fields;

    //TODO. default message...
    public function __construct(array $fields, string $message = '') {
        parent::__construct($message);
        $this->fields = $fields;
    }

    /**
     * @return array
     */
    public function getFields(): array {
        return $this->fields;
    }

}
