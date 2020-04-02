<?php

namespace App\View\Components;

use App\BaseModel;
use Illuminate\View\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DocumentDownload extends Component
{
    /** @var string|null */
    public $url = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(BaseModel $item)
    {
        $document = $item->getMedia('document')->first();

        if ($document instanceof Media) {
            $this->url = $document->getUrl();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.document-download');
    }
}
