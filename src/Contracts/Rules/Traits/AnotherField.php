<?php

namespace Abtswath\Validator\Contracts\Rules\Traits;

use Abtswath\Validator\MessageProvider;

trait AnotherField {

    protected string $anotherField;

    /**
     * @return string
     */
    public function getAnotherField(): string {
        return $this->anotherField;
    }
}
