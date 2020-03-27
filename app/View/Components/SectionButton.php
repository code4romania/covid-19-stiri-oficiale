<?php

namespace App\View\Components;


use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class SectionButton extends Component
{
    /** @var string */
    public $label;

    /** @var string */
    public $url;

    /** @var bool */
    public $active;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $label, string $url, ?bool $active = null)
    {
        $this->label = $label;
        $this->url = $url;
        $this->active = $active;
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
