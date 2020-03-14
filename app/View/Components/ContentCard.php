<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ContentCard extends Component
{
    /** @var array<string> */
    public $card;

    /** @var bool */
    public $readMore;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $card, bool $readMore = true)
    {
        $this->card = array_merge([
            'date' => null,
            'title' => null,
            'excerpt' => null,
            'url' => '/newspage',
        ], $card);

        $this->readMore = $readMore;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.content-card');
    }
}
