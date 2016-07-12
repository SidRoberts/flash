<?php

namespace Sid\Flash\Tests\Unit;

use Sid\Flash\Flash;

use Symfony\Component\HttpFoundation\Session\Session;

class FlashTest extends \Codeception\TestCase\Test
{
    public function testOutput()
    {
        $message1 = "sample message 1";
        $message2 = "sample message 2";
        $message3 = "sample message 3";
        $message4 = "sample message 4";



        $session   = new Session();
        $formatter = new \Sid\Flash\Formatter\Text();

        $flash = new Flash($session, $formatter);



        $flash->danger($message1);
        $flash->success($message2);
        $flash->info($message3);
        $flash->warning($message4);



        $expected = "";

        $expected .= "[DANGER] "  . $message1 . PHP_EOL;
        $expected .= "[SUCCESS] " . $message2 . PHP_EOL;
        $expected .= "[INFO] "    . $message3 . PHP_EOL;
        $expected .= "[WARNING] " . $message4 . PHP_EOL;

        $this->assertEquals(
            $expected,
            $flash->output()
        );
    }
}
