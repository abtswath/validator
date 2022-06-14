<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Abtswath\Validator\MessageProvider;

class DateCompare extends MessageProvider {

    private string $date;

    public function __construct(string $date, string $message = '') {
        parent::__construct($message);
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getValue(): string {
        return $this->date;
    }
}
