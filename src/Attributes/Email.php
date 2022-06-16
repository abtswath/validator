<?php

namespace Abtswath\Validator\Attributes;

use Abtswath\Validator\Contracts\Attribute as AttributeContract;
use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Email extends MessageProvider implements AttributeContract {

    private bool $rfc;

    private bool $strict;

    private bool $dns;

    private bool $spoof;

    private bool $filter;

    private bool $filterUnicode;

    //TODO. default message...
    public function __construct(bool $rfc = true, bool $strict = false, bool $dns = false, bool $spoof = false, bool $filter = false, bool $filterUnicode = false, string $message = '') {
        parent::__construct($message);
        $this->rfc = $rfc;
        $this->strict = $strict;
        $this->dns = $dns;
        $this->spoof = $spoof;
        $this->filter = $filter;
        $this->filterUnicode = $filterUnicode;
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

    /**
     * @return bool
     */
    public function isFilterUnicode(): bool {
        return $this->filterUnicode;
    }
}
