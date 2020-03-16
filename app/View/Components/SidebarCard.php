<?php

namespace App\View\Components;

use App\BaseModel;
use Illuminate\View\Component;

class SidebarCard extends Component
{
    /** @var BaseModel */
    public $model;

    /** @var string */
    public $color;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(BaseModel $item)
    {
        $this->model = $item;

        $this->color = $this->cardColorsFromType($item->color);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sidebar-card');
    }

    protected function cardColorsFromType(string $type): array
    {
        switch ($type) {
            case 'teal':
                $bgColor = 'bg-teal-500';
                $textColor = 'text-black';
                break;

            case 'cyan':
                $bgColor = 'bg-cyan-500';
                $textColor = 'text-black';
                break;

            case 'yellow':
                $bgColor = 'bg-yellow-500';
                $textColor = 'text-black';
                break;

            case 'orange':
                $bgColor = 'bg-orange-500';
                $textColor = 'text-black';
                break;

            case 'red':
                $bgColor = 'bg-red-500';
                $textColor = 'text-white';
                break;

            case 'pink':
                $bgColor = 'bg-pink-500';
                $textColor = 'text-black';
                break;

            default:
                $bgColor = null;
                $textColor = null;
                break;
        }

        return [
            'bg' => $bgColor,
            'text' => $textColor,
        ];
    }
}
