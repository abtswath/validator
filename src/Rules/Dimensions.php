<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;
use \Abtswath\Validator\Traits\File;
use Exception;

class Dimensions implements Rule {
    use File;

    /**
     * @param string $property
     * @param mixed $value
     * @param \Abtswath\Validator\Attributes\Dimensions $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        try {
            $file = self::create($value);
        } catch (Exception) {
            return false;
        }
        if (self::isValid($file) && in_array($file->getMimeType(), ['image/svg+xml', 'image/svg'])) {
            return true;
        }
        if (!self::isValid($file) || !$sizeDetails = getimagesize($file->getRealPath())) {
            return false;
        }
        [$imageWidth, $imageHeight] = $sizeDetails;
        $width = $attribute->getWidth();
        $height = $attribute->getHeight();
        $maxWidth = $attribute->getMaxWidth();
        $maxHeight = $attribute->getMaxHeight();
        $minWidth = $attribute->getMinWidth();
        $minHeight = $attribute->getMinHeight();
        $ratio = $attribute->getRatio();
        if (self::basicCheck($imageWidth, $imageHeight, $width, $height, $maxWidth, $maxHeight, $minWidth, $minHeight)
            || (self::ratioCheck($imageWidth, $imageHeight, $ratio))) {
            return false;
        }
        return true;
    }

    protected static function basicCheck(float $imageWidth, float $imageHeight, ?int $width, ?int $height, ?int $maxWidth, ?int $maxHeight, ?int $minWidth, ?int $minHeight): bool {
        return (!is_null($width) && $imageWidth != $width)
            || (!is_null($height) && $imageHeight != $height)
            || (!is_null($maxWidth) && $imageWidth > $maxWidth)
            || (!is_null($maxHeight) && $imageHeight > $maxHeight)
            || (!is_null($minWidth) && $imageWidth < $minWidth)
            || (!is_null($minHeight) && $imageHeight < $minHeight);
    }

    protected static function ratioCheck(float $imageWidth, float $imageHeight, ?float $ratio): bool {
        if (is_null($ratio)) {
            return false;
        }

        return abs($ratio - $imageWidth / $imageHeight) > 1 / (max($imageWidth, $imageHeight) + 1);
    }
}
