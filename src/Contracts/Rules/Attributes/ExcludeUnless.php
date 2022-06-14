<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Abtswath\Validator\Contracts\Rules\Traits\AnotherField;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class ExcludeUnless extends ExcludeIf {

}
