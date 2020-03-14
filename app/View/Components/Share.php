<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Share extends Component
{
    /** @var array<string> */
    public $platforms = [
        [
            'id' => 'facebook',
            'uri' => 'https://www.facebook.com/sharer/sharer.php?u=',
        ],
        [
            'id' => 'twitter',
            'uri' => 'https://twitter.com/intent/tweet?url=',
        ],
        [
            'id' => 'linkedin',
            'uri' => 'http://www.linkedin.com/shareArticle?mini=true&url=',
        ],
    ];

    /** @var string|null */
    public $url;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $url = null)
    {
        $this->url = $url ?? url()->current();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.share');
    }
}
