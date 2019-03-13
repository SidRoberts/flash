<?php

namespace Sid\Flash\Twig;

use Sid\Flash\Flash;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FlashExtension extends AbstractExtension
{
    /**
     * @var Flash
     */
    protected $flash;



    public function __construct(Flash $flash)
    {
        $this->flash = $flash;
    }



    public function getFunctions()
    {
        return [
            new TwigFunction(
                "flash",
                function () : string {
                    return $this->flash->output();
                }
            )
        ];
    }



    public function getName()
    {
        return "flash";
    }
}
