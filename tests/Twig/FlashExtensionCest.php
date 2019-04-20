<?php

namespace Tests\Twig;

use Sid\Flash\Flash;
use Sid\Flash\Formatter\HtmlFormatter;
use Sid\Flash\Twig\FlashExtension;
use Symfony\Component\HttpFoundation\Session\Session;
use Tests\UnitTester;
use Twig\Loader\ArrayLoader;

class FlashExtensionCest
{
    public function extension(UnitTester $I)
    {
        $session   = new Session();
        $formatter = new HtmlFormatter();

        $flash = new Flash(
            $session,
            $formatter
        );



        $flash->danger("danger message");



        $loader = new ArrayLoader(
            [
                "template" => "{{ flash()|raw }}",
            ]
        );

        $twig = new \Twig\Environment(
            $loader
        );



        $twig->addExtension(
            new FlashExtension($flash)
        );



        $expected = "<div class=\"alert alert-danger\">danger message</div>" . PHP_EOL;

        $actual = $twig->render("template");

        $I->assertEquals(
            $expected,
            $actual
        );
    }
}
