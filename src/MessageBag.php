<?php

namespace Sid\Flash;

class MessageBag
{
    /**
     * @var array
     */
    protected $messages = [];



    public function add(string $level, string $message)
    {
        $this->messages[] = [
            "level" => $level,
            "message" => $message,
        ];
    }



    public function getMessages() : array
    {
        return $this->messages;
    }
}
