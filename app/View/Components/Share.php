<?php

namespace App\View\Components;

use App\BaseModel;
use Illuminate\View\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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

    /** @var BaseModel */
    public $item;

    /** @var string|null */
    public $downloadUrl = null;

    /** @var string */
    public $url;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(BaseModel $item)
    {
        $this->item = $item;
        $this->url = url()->current();

        $media = $item->getMedia('document')->first();

        if ($media instanceof Media) {
            $this->downloadUrl = $item->getMedia('document')->first()->getUrl();
        }
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
