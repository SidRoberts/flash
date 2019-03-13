<?php

namespace Sid\Flash\Formatter;

use Sid\Flash\FormatterInterface;

use InvalidArgumentException;

class HtmlFormatter implements FormatterInterface
{
    public function output(string $level, string $message) : string
    {
        $html = sprintf(
            "<div class=\"alert alert-%s\">%s</div>",
            $level,
            $message
        );

        return $html;
    }
}
