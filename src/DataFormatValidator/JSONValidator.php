<?php

declare(strict_types = 1);

namespace Constup\Validator\DataFormatValidator;

use Constup\CodeFlow\Message\FlowMessageProducer;
use Constup\CodeFlow\Message\GenericFlowMessage;
use Constup\CodeFlow\Message\GenericFlowMessageInterface;
use Psr\Log\LogLevel;

/**
 * Class JSONValidator
 *
 * @package Constup\Validator\DataFormatValidator
 */
class JSONValidator
{
    /**
     * @param string $data
     *
     * @return GenericFlowMessageInterface
     */
    public static function validateJSON(string $data): GenericFlowMessageInterface
    {
        $json = json_decode($data);
        if ($json && $data != $json) {
            return new GenericFlowMessage(false, false, null, 'JSON_NOT_VALID', 'The provided data is not in valid JSON format.', LogLevel::INFO, false, $data);
        }

        return new GenericFlowMessage(true, false, null, 'SUCCESS', 'Success.', LogLevel::INFO, false, $json);
    }
}
