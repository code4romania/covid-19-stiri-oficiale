<?php

namespace App;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class SidebarItem extends BaseModel implements Sortable
{
    use SortableTrait;

    /** @var array<string> */
    public $sortable = [
        'order_column_name'  => 'weight',
        'sort_when_creating' => true,
    ];
}
