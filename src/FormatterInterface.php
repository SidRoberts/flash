<?php

namespace Sid\Flash;

interface FormatterInterface
{
    public function output(string $level, string $message) : string;
}
