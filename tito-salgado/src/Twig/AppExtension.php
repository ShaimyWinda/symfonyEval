<?php

namespace App\Twig;

use Twig\TwigFilter;
use Twig\TwigFunction;
use Twig\Extension\GlobalsInterface;
use Twig\Extension\AbstractExtension;

class AppExtension extends AbstractExtension implements GlobalsInterface
{
    public function getGlobals():array
    {
        return [
            'site_name' => 'Tito Salgado',
        ];
    }
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('filter_name', [$this, 'doSomething']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('function_name', [$this, 'doSomething']),
        ];
    }

    public function doSomething($value)
    {
        // ...
    }
}
