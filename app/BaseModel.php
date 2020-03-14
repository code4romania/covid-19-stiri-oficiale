<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BaseModel extends Model implements HasMedia
{
    use InteractsWithMedia, SoftDeletes;
    protected $with=['media'];


    public function registerMediaConversions (\Spatie\MediaLibrary\MediaCollections\Models\Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(130)
            ->height(130);
    }

    public function registerMediaCollections (): void
    {
        $this->addMediaCollection('images')->acceptsMimeTypes(['image/jpeg', 'image/png']);
    }


    //
}
