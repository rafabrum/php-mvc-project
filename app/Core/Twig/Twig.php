<?php

namespace App\Core\Twig;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Twig
{
    private FilesystemLoader $loader;
    public Environment $twig;

    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader(getcwd() . '/view');
        $this->twig   = new \Twig\Environment($this->loader, ['debug' => true]);
    }
}