<?php

namespace Abtswath\Validator\Traits;

use SplFileInfo;

trait GetSize {

    public static function getSize(mixed $value): int {
        if (is_numeric($value)) {
            return $value;
        } elseif (is_array($value)) {
            return count($value);
        } elseif ($value instanceof SplFileInfo) {
            return $value->getSize() / 1024;
        }
        return mb_strlen($value ?? '');
    }
}
