<?php

namespace Sid\Flash;

use Sid\Flash\FormatterInterface;

use Symfony\Component\HttpFoundation\Session\Session;

interface FlashInterface
{
    public function success(string $message);

    public function info(string $message);

    public function warning(string $message);

    public function danger(string $message);



    public function output() : string;
}
