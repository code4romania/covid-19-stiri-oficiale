<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarCard extends Component
{
    /** @var array<string> */
    public $card;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $card)
    {
        $this->card = array_merge([
            'type' => null,
            'title' => null,
            'text' => null,
        ], $card);

        $this->card['color'] = $this->cardColorsFromType($card['type']);
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

            case 'yellow':
                $bgColor = 'bg-yellow-500';
                $textColor = 'text-black';
                break;

            case 'red':
                $bgColor = 'bg-red-500';
                $textColor = 'text-white';
                break;

            case 'pink':
                $bgColor = 'bg-pink-500';
                $textColor = 'text-white';
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
