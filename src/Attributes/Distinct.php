<?php

namespace Abtswath\Validator\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Distinct extends ArrayValue {

    private bool $strict;

    private bool $ignoreCase;

    public function __construct(bool $strict = false, bool $ignoreCase = false, string $message = '') {
        parent::__construct($message);
        $this->strict = $strict;
        $this->ignoreCase = $ignoreCase;
    }

    /**
     * @return bool
     */
    public function isStrict(): bool {
        return $this->strict;
    }

    /**
     * @return bool
     */
    public function isIgnoreCase(): bool {
        return $this->ignoreCase;
    }

}
