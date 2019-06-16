<?php

declare(strict_types = 1);

namespace Constup\Validator\Filesystem;

/**
 * Class FileValidator
 *
 * @package Constup\Validator\Filesystem
 */
interface FileValidatorInterface
{
    const OK                    = 'OK';
    const DOES_NOT_EXIST        = 'DOES_NOT_EXIST';
    const NOT_A_FILE            = 'NOT_A_FILE';
    const NOT_READABLE          = 'NOT_READABLE';
    const NOT_WRITABLE          = 'NOT_WRITABLE';
    const NOT_A_DIRECTORY       = 'NOT_A_DIRECTORY';

    /**
     * @param string $absoluteFilePath
     * @param bool   $checkIfWritable
     *
     * @return string
     */
    public function validateFile(string $absoluteFilePath, bool $checkIfWritable = false): string;

    /**
     * @param string $absoluteDirectoryPath
     *
     * @return string
     */
    public function validateDirectory(string $absoluteDirectoryPath): string;
}
