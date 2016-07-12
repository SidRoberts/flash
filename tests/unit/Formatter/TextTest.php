<?php

namespace Sid\Flash\Tests\Unit\Formatter;

class TextTest extends \Codeception\TestCase\Test
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
