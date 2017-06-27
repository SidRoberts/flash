<?php

namespace Sid\Flash\Formatter;

use Sid\Flash\FormatterInterface;

class Text implements FormatterInterface
{
    public function output(string $level, string $message) : string
    {
        return sprintf(
            "[%s] %s",
            strtoupper($level),
            $message
        );
    }
}
