<?php

namespace Sid\Flash\Twig;

use Sid\Flash\Flash;
use Twig_Extension;
use Twig_SimpleFunction;

class FlashExtension extends Twig_Extension
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
            new Twig_SimpleFunction(
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
