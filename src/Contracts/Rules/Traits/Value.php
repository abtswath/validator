<?php

namespace Abtswath\Validator\Contracts\Rules\Traits;

trait Value {

    protected mixed $value;

    /**
     * @return mixed
     */
    public function getValue(): mixed {
        return $this->value;
    }

}
