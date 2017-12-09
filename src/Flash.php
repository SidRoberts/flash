<?php

namespace Sid\Flash;

use Sid\Flash\FormatterInterface;

use Symfony\Component\HttpFoundation\Session\Session;

class Flash implements FlashInterface
{
    /**
     * @var Session
     */
    protected $session;

    /**
     * @var FormatterInterface
     */
    protected $formatter;



    const SESSION_ID = "_flashMessages";



    public function __construct(Session $session, FormatterInterface $formatter)
    {
        $this->session   = $session;
        $this->formatter = $formatter;
    }



    public function success(string $message)
    {
        $this->add("success", $message);
    }

    public function info(string $message)
    {
        $this->add("info", $message);
    }

    public function warning(string $message)
    {
        $this->add("warning", $message);
    }

    public function danger(string $message)
    {
        $this->add("danger", $message);
    }

    protected function add(string $level, string $message)
    {
        $messageBag = $this->getMessageBag();

        $messageBag->add($level, $message);

        $this->session->set(self::SESSION_ID, $messageBag);
    }



    public function output() : string
    {
        $messageBag = $this->getMessageBag();

        $messages = $messageBag->getMessages();

        $output = "";

        foreach ($messages as $message) {
            $formattedMessage = $this->formatter->output(
                $message["level"],
                $message["message"]
            );

            $output .= $formattedMessage . PHP_EOL;
        }

        return $output;
    }



    protected function getMessageBag() : MessageBag
    {
        $messageBag = $this->session->get(self::SESSION_ID);

        if ($messageBag === null) {
            return new MessageBag();
        }

        $this->session->remove(self::SESSION_ID);

        return $messageBag;
    }
}
