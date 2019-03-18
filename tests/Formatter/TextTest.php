<?php

namespace Sid\Flash\Tests\Unit\Formatter;

use Codeception\TestCase\Test;

use Sid\Flash\Formatter\TextFormatter;

class TextTest extends Test
{
    public function testOutput()
    {
        $formatter = new TextFormatter();

        $message = "Hello world";

        $this->assertEquals(
            "[DANGER] " . $message,
            $formatter->output("danger", $message)
        );
    }
}
