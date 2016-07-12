<?php

namespace Sid\Flash\Tests\Unit;

use Sid\Flash\MessageBag;

class MessageBagTest extends \Codeception\TestCase\Test
{
    public function testGetMessages()
    {
        $messageBag = new MessageBag();



        $this->assertEquals(
            [],
            $messageBag->getMessages()
        );



        $messageBag->add("danger", "sample danger");
        $messageBag->add("success", "sample success");
        $messageBag->add("danger", "sample danger 2");



        $this->assertEquals(
            [
                [
                    "level"   => "danger",
                    "message" => "sample danger",
                ],
                [
                    "level"   => "success",
                    "message" => "sample success",
                ],
                [
                    "level"   => "danger",
                    "message" => "sample danger 2",
                ],
            ],
            $messageBag->getMessages()
        );
    }
}
