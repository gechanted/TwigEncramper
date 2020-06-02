<?php
declare(strict_types=1);

namespace TwigEncramper;

use Twig\Environment;
use Twig\TwigFunction;

class TwigEncramper
{

    public static function require(Environment $twig): Environment
    {
        $call = new Call($twig);
        $twig->addFunction(new TwigFunction('render', $call));
        $twig->addFunction(new TwigFunction('call', $call));
//        $twig->addFunction(new TwigFunction('expectString', function ($possibleString) {
//            if (is_string($possibleString)) {
//                return $possibleString;
//            }
//            throw new \RuntimeException('is not a string');
//        }));

        return $twig;
    }
}