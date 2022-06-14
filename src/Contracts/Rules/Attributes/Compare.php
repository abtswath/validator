<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Abtswath\Validator\Contracts\Rules\Traits\AnotherField;
use Abtswath\Validator\MessageProvider;

class Compare extends MessageProvider {
    use AnotherField;

    public function __construct(string $anotherField, string $message = '') {
        parent::__construct($message);
        $this->anotherField = $anotherField;
    }

}
