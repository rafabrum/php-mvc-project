<?php

namespace App\Http\Controllers;

use Twig\Environment;

class Controller
{
    protected Environment $twig;

    public function __construct()
    {
        $loader     = new \Twig\Loader\FilesystemLoader(getcwd() . '/view');
        $this->twig = new \Twig\Environment($loader, ['debug' => true]);
    }

    public function render(string $view, array $parameters = [])
    {
        echo $this->twig->render("{$view}.twig.php", $parameters);
    }
}