<?php

namespace Abtswath\Validator\Exceptions;

use Abtswath\Validator\Validator;
use Exception;
use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

class ValidationException extends Exception {
    public Validator $validator;

    public function __construct(Validator $validator) {
        parent::__construct(static::summarize($validator));
        $this->validator = $validator;
    }

    protected static function summarize(Validator $validator): string {
        if ($validator->message()->isEmpty()) {
            return 'The given data was invalid.';
        }
        return $validator->message()->first() . ' (and more errors)';
    }
}
