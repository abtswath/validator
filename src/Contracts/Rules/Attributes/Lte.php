<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Lte extends Compare {
}
