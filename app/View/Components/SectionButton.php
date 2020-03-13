<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SectionButton extends Component
{
    /** @var string */
    public $label;

    /** @var string */
    public $url;

    /** @var boolean */
    public $active;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $label, string $url)
    {
        $this->label = $label;
        $this->url = $url;
        $this->active = false;
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
