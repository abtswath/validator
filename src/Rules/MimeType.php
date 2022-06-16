<?php

namespace Abtswath\Validator\Rules;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Contracts\Rule;
use Abtswath\Validator\Validator;
use Exception;
use Symfony\Component\Mime\MimeTypes;

class MimeType implements Rule {
    use \Abtswath\Validator\Traits\File;

    /**
     * @param string $property
     * @param mixed $value
     * @param \Abtswath\Validator\Attributes\MimeType $attribute
     * @param Validator $validator
     * @return bool
     */
    public static function validate(string $property, mixed $value, Attribute $attribute, Validator $validator): bool {
        try {
            $file = self::create($value);
        } catch (Exception) {
            return false;
        }
        if (!self::isValid($file)) {
            return false;
        }
        $mimeTypes = $attribute->getMimeTypes();
        return in_array($file->getMimeType(), $mimeTypes)
            || in_array(explode('/', $file->getMimeType())[0] . '/*', $mimeTypes);
    }
}
