<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BaseModel extends Model implements HasMedia
{
    use InteractsWithMedia, SoftDeletes;

    protected $with = ['media'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(130)
            ->height(130);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')->acceptsMimeTypes(['image/jpeg', 'image/png']);
        $this->addMediaCollection('document')->singleFile();
    }

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public function scopeListing($query)
    {
        return $query->published()->orderBy('updated_at', 'DESC')->paginate(10);
    }
}
