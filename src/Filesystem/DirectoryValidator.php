<?php

declare(strict_types = 1);

namespace Constup\Validator\Filesystem;

/**
 * Class DirectoryValidator
 *
 * @package Constup\Validator\Filesystem
 */
class DirectoryValidator implements DirectoryValidatorInterface
{
    /**
     * @param string $absoluteDirectoryPath
     *
     * @return string
     */
    public function validateDirectory(string $absoluteDirectoryPath): string
    {
        if (!file_exists($absoluteDirectoryPath)) {
            return self::DOES_NOT_EXIST;
        }

        if (!is_dir($absoluteDirectoryPath)) {
            return self::NOT_A_DIRECTORY;
        }

        if (!is_readable($absoluteDirectoryPath)) {
            return self::NOT_READABLE;
        }

        return self::OK;
    }
}
