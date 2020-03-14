<?php

namespace App\View\Components;

use App\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class ContentCard extends Component
{
    /** @var BaseModel */
    public $model;

    /** @var string */
    public $route;

    /** @var bool */
    public $readMore;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(BaseModel $item, ?string $route = null, bool $readMore = true)
    {
        $this->model = $item;
        $this->route = $route;
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
