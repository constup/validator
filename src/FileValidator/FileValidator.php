<?php

declare(strict_types = 1);

namespace Constup\Validator\FileValidator;

use Constup\CodeFlow\Message\FlowMessageProducer;
use Constup\CodeFlow\Message\GenericFlowMessage;
use Constup\CodeFlow\Message\GenericFlowMessageInterface;
use Psr\Log\LogLevel;

/**
 * Class FileValidator
 *
 * @package Constup\Validator\FileValidator
 */
class FileValidator
{
    /**
     * @param string $absolute_file_path
     * @param bool   $check_is_file
     * @param bool   $check_is_readable
     *
     * @return GenericFlowMessageInterface
     */
    public static function validateFile(string $absolute_file_path, bool $check_is_file = true, bool $check_is_readable = true): GenericFlowMessageInterface
    {
        if ($check_is_file) {
            if (!is_file($absolute_file_path)) {
                return new GenericFlowMessage(false, false, null, 'NO_A_FILE', 'The provided path is not a file.', LogLevel::INFO, false, $absolute_file_path);
            }
        }

        if ($check_is_readable) {
            if (!is_readable($absolute_file_path)) {
                return new GenericFlowMessage(false, false, null, 'FILE_NOT_READABLE', 'The file is not readable', LogLevel::INFO, false, $absolute_file_path);
            }
        }

        return FlowMessageProducer::produceEmptySuccess();
    }
}
