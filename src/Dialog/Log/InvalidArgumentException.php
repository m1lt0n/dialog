<?php
namespace Dialog\Log;

/**
 * The InvalidArgumentException is thrown when an invalid log level is provided
 * to the log method (and the log specific methods), as required by the
 * PSR-3 requirements
 */
class InvalidArgumentException extends \InvalidArgumentException
{
}
