<?php

namespace Abtswath\Validator\Traits;

use DateTime;
use DateTimeInterface;
use Exception;
use InvalidArgumentException;

trait DateCompare {

    public static function compare($date1, $date2, $operator): bool {
        try {
            $date1 = self::dateCreate($date1);
            $date2 = self::dateCreate($date2);
            return match ($operator) {
                '>' => $date1->diff($date2, true) > 0,
                '<' => $date1->diff($date2, true) < 0,
                '=' => $date1->diff($date2, true) == 0,
                '>=' => $date1->diff($date2, true) >= 0,
                '<=' => $date1->diff($date2, true) <= 0,
                default => throw new InvalidArgumentException()
            };
        } catch (Exception) {
            return false;
        }
    }

    protected static function dateCreate($value): DateTimeInterface {
        if ($value instanceof DateTimeInterface) {
            return $value;
        }

        try {
            if ((!is_string($value) && !is_numeric($value)) || strtotime($value) === false) {
                throw new InvalidArgumentException;
            }
        } catch (Exception) {
            throw new InvalidArgumentException;
        }

        $date = date_parse($value);

        if (!checkdate($date['month'], $date['day'], $date['year'])) {
            throw new InvalidArgumentException;
        }
        return date_create_immutable($value);
    }

}
