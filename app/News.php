<?php

namespace App;

use App\Institution;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\Models\Media;


class News extends BaseModel
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        if (auth()->user()) {
            $this->user_id = auth()->user()->id;
        }
    }

    protected $with = ['institution'];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
