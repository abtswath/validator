<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class After extends DateCompare {
}
