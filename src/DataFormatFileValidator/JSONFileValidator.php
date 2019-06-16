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
class JSONFileValidator implements JSONFileValidatorInterface
{
    /** @var FileValidatorInterface */
    private $fileValidator;
    /** @var JSONValidatorInterface */
    private $JSONValidator;

    /**
     * JSONFileValidator constructor.
     *
     * @param FileValidatorInterface $fileValidator
     * @param JSONValidatorInterface $JSONValidator
     */
    public function __construct(FileValidatorInterface $fileValidator, JSONValidatorInterface $JSONValidator)
    {
        $this->fileValidator = $fileValidator;
        $this->JSONValidator = $JSONValidator;
    }

    /**
     * @return FileValidatorInterface
     */
    public function getFileValidator(): FileValidatorInterface
    {
        return $this->fileValidator;
    }

    /**
     * @return JSONValidatorInterface
     */
    public function getJSONValidator(): JSONValidatorInterface
    {
        return $this->JSONValidator;
    }

    /**
     * @param string $absoluteFilePath
     *
     * @return string
     */
    public function validateJSONFile(string $absoluteFilePath): string
    {
        $fileValidation = $this->getFileValidator()->validateFile($absoluteFilePath);
        if ($fileValidation !== FileValidatorInterface::OK) {
            return $fileValidation;
        }

        $contents = file_get_contents($absoluteFilePath);

        $jsonValidation = $this->getJSONValidator()->validateJSON($contents);
        if ($jsonValidation !== JSONValidatorInterface::OK) {
            return $jsonValidation;
        }

        return self::OK;
    }
}
