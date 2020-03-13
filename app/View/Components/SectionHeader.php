<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SectionHeader extends Component
{
    /** @var string */
    public $title;

    /** @var string */
    public $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, string $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.section-header');
    }
}
