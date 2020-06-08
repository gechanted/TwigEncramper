<?php
declare(strict_types=1);

namespace TwigEncramper;

use Twig\Environment;

class Call
{

    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }


    public function __invoke(string $file, ...$args)
    {
        $storage = null;
        $result = [];
        foreach ($args as $argument) {
            if ($storage === null) {
                $storage = $argument;
            } else {
                $result[$storage] = $argument;
                $storage = null;
            }
        }
        return $this->twig->render($file, $result);
    }
}