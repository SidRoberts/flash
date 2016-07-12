<?php

namespace Sid\Flash\Tests\Unit\Formatter;

class HtmlTest extends \Codeception\TestCase\Test
{
    public function testOutput()
    {
        $formatter = new \Sid\Flash\Formatter\Html();

        $message = "Hello world";

        $this->assertEquals(
            "<div class=\"alert alert-danger\">" . $message . "</div>",
            $formatter->output("danger", $message)
        );
    }
}
