<?php

declare(strict_types = 1);

namespace Constup\Validator\Filesystem;

/**
 * Class DirectoryValidator
 *
 * @package Constup\Validator\Filesystem
 */
interface DirectoryValidatorInterface
{
    const OK                    = 'OK';
    const DOES_NOT_EXIST        = 'DOES_NOT_EXIST';
    const NOT_READABLE          = 'NOT_READABLE';
    const NOT_A_DIRECTORY       = 'NOT_A_DIRECTORY';

    /**
     * @param string $absoluteDirectoryPath
     *
     * @return string
     */
    public function validateDirectory(string $absoluteDirectoryPath): string;
}
