<?php

namespace Tests\Formatter;

use Sid\Flash\Formatter\HtmlFormatter;
use Tests\UnitTester;

class HtmlFormatterCest
{
    public function output(UnitTester $I)
    {
        $formatter = new HtmlFormatter();

        $message = "Hello world";

        $expected = "<div class=\"alert alert-danger\">" . $message . "</div>";

        $I->assertEquals(
            $expected,
            $formatter->output("danger", $message)
        );
    }
}
