<?php

namespace Sid\Flash\Tests\Unit\Formatter;

use Codeception\TestCase\Test;

class TextTest extends Test
{
    public function testOutput()
    {
        $formatter = new \Sid\Flash\Formatter\Text();

        $message = "Hello world";

        $this->assertEquals(
            "[DANGER] " . $message,
            $formatter->output("danger", $message)
        );
    }
}
