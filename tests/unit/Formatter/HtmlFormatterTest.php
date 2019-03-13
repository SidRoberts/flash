<?php

namespace Sid\Flash\Tests\Unit\Formatter;

use Codeception\TestCase\Test;

use Sid\Flash\Formatter\HtmlFormatter;

class HtmlFormatterTest extends Test
{
    public function testOutput()
    {
        $formatter = new HtmlFormatter();

        $message = "Hello world";

        $this->assertEquals(
            "<div class=\"alert alert-danger\">" . $message . "</div>",
            $formatter->output("danger", $message)
        );
    }
}
