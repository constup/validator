<?php

declare(strict_types = 1);

namespace Constup\Validator\DataFormatFileValidator;

use Constup\Validator\DataFormatValidator\JSONValidatorInterface;
use Constup\Validator\Filesystem\FileValidatorInterface;

/**
 * Class JSONFileValidator
 *
 * @package Constup\Validator\DataFormatFileValidator
 */
interface JSONFileValidatorInterface
{
    const OK = 'OK';

    /**
     * @return FileValidatorInterface
     */
    public function getFileValidator(): FileValidatorInterface;

    /**
     * @return JSONValidatorInterface
     */
    public function getJSONValidator(): JSONValidatorInterface;

    /**
     * @param string $absoluteFilePath
     *
     * @return string
     */
    public function validateJSONFile(string $absoluteFilePath): string;
}
