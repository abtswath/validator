<?php

namespace Abtswath\Validator\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class ExcludeUnless extends ExcludeIf {

}
