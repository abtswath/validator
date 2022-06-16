<?php

namespace Abtswath\Validator\Traits;

use SplFileInfo;
use Symfony\Component\HttpFoundation\File\File as SymfonyFile;
use Symfony\Component\HttpFoundation\File\UploadedFile;

trait File {

    public static function create(SplFileInfo|string $value): SymfonyFile {
        if ($value instanceof SplFileInfo) {
            $value = $value->getRealPath();
        }
        return new SymfonyFile($value);
    }

    public static function isValid(SymfonyFile $file): bool {
        if ($file instanceof UploadedFile && !$file->isValid()) {
            return false;
        }

        return true;
    }

}
