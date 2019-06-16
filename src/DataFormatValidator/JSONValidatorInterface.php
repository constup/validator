<?php

declare(strict_types = 1);

namespace Constup\Validator\DataFormatValidator;

/**
 * Class JSONValidator
 *
 * @package Constup\Validator\DataFormatValidator
 */
interface JSONValidatorInterface
{
    const OK                = 'OK';
    const JSON_NOT_VALID    = 'JSON_NOT_VALID';

    /**
     * @param string $data
     *
     * @return string
     */
    public function validateJSON(string $data): string;
}
