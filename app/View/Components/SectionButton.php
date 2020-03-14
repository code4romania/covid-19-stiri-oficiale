<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class SectionButton extends Component
{
    /** @var string */
    public $label;

    /** @var string */
    public $route;

    /** @var bool */
    public $active;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $label, string $route)
    {
        $this->label = $label;
        $this->route = $route;

        $currentRouteGroup = explode('.', Route::currentRouteName())[0];
        $routeGroup = explode('.', $route)[0];

        $this->active = $currentRouteGroup === $routeGroup;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.section-button');
    }
}
