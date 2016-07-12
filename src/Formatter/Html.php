<?php

namespace Sid\Flash\Formatter;

use Sid\Flash\FormatterInterface;

use InvalidArgumentException;

class Html implements FormatterInterface
{
    public function output(string $level, string $message) : string
    {
        $cssClass = "alert alert-" . $level;

        return "<div class=\"" . $cssClass . "\">" . $message . "</div>";
    }
}
