<?php

declare(strict_types = 1);

namespace Constup\Validator\Filesystem;

/**
 * Class FileValidator
 *
 * @package Constup\Validator\Filesystem
 */
class FileValidator implements FileValidatorInterface
{
    /**
     * @param string $absoluteFilePath
     * @param bool   $checkIfWritable
     *
     * @return string
     */
    public function validateFile(string $absoluteFilePath, bool $checkIfWritable = false): string
    {
        if (!file_exists($absoluteFilePath)) {
            return self::DOES_NOT_EXIST;
        }

        if (!is_file($absoluteFilePath)) {
            return self::NOT_A_FILE;
        }

        if (!is_readable($absoluteFilePath)) {
            return self::NOT_READABLE;
        }

        if ($checkIfWritable) {
            if (is_writable($absoluteFilePath)) {
                return self::NOT_WRITABLE;
            }
        }

        return self::OK;
    }

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
