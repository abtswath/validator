<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Abtswath\Validator\Contracts\Rules\Traits\AnotherField;
use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class ProhibitedUnless extends ProhibitedIf {

}
