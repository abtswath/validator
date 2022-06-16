<?php

namespace Abtswath\Validator\Traits;

trait AnotherField {

    protected string $anotherField;

    /**
     * @return string
     */
    public function getAnotherField(): string {
        return $this->anotherField;
    }
}
