<?php

namespace App\View\Components\Base;

use Illuminate\View\Component;

class Lucide extends Component
{
    public $icon;
    
    public function __construct($icon)
    {
        $this->icon = $icon;
    }

    public function render()
    {
        // Font Awesome ikonlarına dönüştür
        $faIcons = [
            'Search' => 'fa-search',
            'ChevronDown' => 'fa-chevron-down',
            'Menu' => 'fa-bars',
            'User' => 'fa-user',
            'Bell' => 'fa-bell',
            'Settings' => 'fa-cog',
            'Home' => 'fa-home',
            'Package' => 'fa-box',
            'ShoppingCart' => 'fa-shopping-cart',
            'DollarSign' => 'fa-dollar-sign',
        ];
        
        $faIcon = $faIcons[$this->icon] ?? 'fa-circle';
        
        return view('components.base.lucide', [
            'faIcon' => $faIcon
        ]);
    }
}