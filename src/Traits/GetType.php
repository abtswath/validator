<?php

namespace Abtswath\Validator\Traits;

trait GetType {

    public static function isSameType($first, $second): bool {
        return gettype($first) == gettype($second);
    }
}
