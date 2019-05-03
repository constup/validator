<?php

declare(strict_types = 1);

namespace Constup\Validator\DataFormatFileValidator;

use Constup\CodeFlow\Message\FlowMessageProducer;
use Constup\CodeFlow\Message\GenericFlowMessageInterface;
use Constup\Validator\DataFormatValidator\JSONValidator;
use Constup\Validator\FileValidator\FileValidator;

/**
 * Class JSONFileValidator
 *
 * @package Constup\Validator\DataFormatFileValidator
 */
class JSONFileValidator
{
    /**
     * @param string $absolute_file_path
     *
     * @return GenericFlowMessageInterface
     */
    public static function validateJSONFile(string $absolute_file_path): GenericFlowMessageInterface
    {
        $file_validation = FileValidator::validateFile($absolute_file_path);
        if (!$file_validation->isSuccess()) {
            return $file_validation;
        }

        $contents = file_get_contents($absolute_file_path);

        $json_validation = JSONValidator::validateJSON($contents);
        if (!$json_validation->isSuccess()) {
            return $json_validation;
        }

        return FlowMessageProducer::produceEmptySuccess();
    }
}
