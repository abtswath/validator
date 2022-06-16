<?php

namespace Abtswath\Validator\Exceptions;

use Exception;

class RuleDoesNotExistException extends Exception {

    public function __construct(string $name) {
        parent::__construct("Rule [$name] does not exist.");
    }
}
