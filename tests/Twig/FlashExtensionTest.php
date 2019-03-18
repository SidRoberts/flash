<?php

namespace Sid\Flash\Test\Unit\Twig;

use Codeception\TestCase\Test;

use Sid\Flash\Flash;
use Sid\Flash\Formatter\HtmlFormatter;
use Sid\Flash\Twig\FlashExtension;

use Symfony\Component\HttpFoundation\Session\Session;

use Twig\Loader\ArrayLoader;

class FlashExtensionTest extends Test
{
    public function testExtension()
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



        $actual = $twig->render("template");



        $this->assertEquals(
            "<div class=\"alert alert-danger\">danger message</div>" . PHP_EOL,
            $actual
        );
    }
}
