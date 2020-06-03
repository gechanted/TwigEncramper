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
        return $this->twig->render($file, $args);
    }
}