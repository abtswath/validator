<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Between extends MessageProvider {

    private int $min;

    private int $max;

    //TODO. default message...
    public function __construct(int $min, int $max, string $message = '') {
        parent::__construct($message);
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * @return int
     */
    public function getMin(): int {
        return $this->min;
    }

    /**
     * @return int
     */
    public function getMax(): int {
        return $this->max;
    }
}
