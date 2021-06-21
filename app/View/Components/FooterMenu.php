<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class FooterMenu extends Component
{
    public array $menus;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menus = Cache::tags('menu')->rememberForever('footer-menu', fn () => [
            nova_get_menu_by_slug('footer1'),
            nova_get_menu_by_slug('footer2'),
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer-menu');
    }
}
