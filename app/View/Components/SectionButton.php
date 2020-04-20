<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SectionButton extends Component
{
    /** @var string */
    public $label;

    /** @var string */
    public $url;

    /** @var bool */
    public $active;

    /** @var bool */
    public $external;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $label, string $url, bool $active = false, bool $external = false)
    {
        $this->label = $label;
        $this->url = $url;
        $this->active = $active;
        $this->external = $external;
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
