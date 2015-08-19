<?php
namespace Dialog\Log;

/**
 * The AbstractLogger holds most of the common functionality of a logger
 * (actually the level specific logging methods, e.g. warning/error etc) and
 * requires from implementors to implement a log method.
 */
abstract class AbstractLogger implements LoggerInterface
{
    use LoggerTrait;
}
