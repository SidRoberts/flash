<?php

namespace Sid\Flash\Test\Unit\Twig;

use Sid\Flash\Flash;
use Sid\Flash\Twig\FlashExtension;

use Twig_Loader_Array;
use Twig_Environment;

use Symfony\Component\HttpFoundation\Session\Session;

class FlashExtensionTest extends \Codeception\TestCase\Test
{
    public function testExtension()
    {
        $session = new Session();

        $formatter = new \Sid\Flash\Formatter\Html();

        $flash = new Flash(
            $session,
            $formatter
        );



        $flash->danger("danger message");



        $loader = new Twig_Loader_Array(
            [
                "template" => "{{ flash()|raw }}",
            ]
        );

        $twig = new Twig_Environment(
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
