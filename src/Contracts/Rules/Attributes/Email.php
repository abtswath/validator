<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Email extends MessageProvider {

    private bool $rfc;

    private bool $strict;

    private bool $dns;

    private bool $spoof;

    private bool $filter;

    //TODO. default message...
    public function __construct(bool $rfc, bool $strict, bool $dns, bool $spoof, bool $filter, string $message = '') {
        parent::__construct($message);
        $this->rfc = $rfc;
        $this->strict = $strict;
        $this->dns = $dns;
        $this->spoof = $spoof;
        $this->filter = $filter;
    }

    /**
     * @return bool
     */
    public function isRfc(): bool {
        return $this->rfc;
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
    public function isDns(): bool {
        return $this->dns;
    }

    /**
     * @return bool
     */
    public function isSpoof(): bool {
        return $this->spoof;
    }

    /**
     * @return bool
     */
    public function isFilter(): bool {
        return $this->filter;
    }
}
