<?php

declare(strict_types = 1);

namespace Constup\Validator\DataFormatValidator;

/**
 * Class JSONValidator
 *
 * @package Constup\Validator\DataFormatValidator
 */
class JSONValidator implements JSONValidatorInterface
{
    /**
     * @param string $data
     *
     * @return string
     */
    public function validateJSON(string $data): string
    {
        $json = json_decode($data);
        if (!($json && $data != $json)) {
            return self::JSON_NOT_VALID;
        }

        return self::OK;
    }
}
