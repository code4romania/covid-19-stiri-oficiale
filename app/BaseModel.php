<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;

class BaseModel extends Model implements HasMedia
{
    use InteractsWithMedia, Searchable, SoftDeletes, HasTags;

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 10;

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

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return $this->only([
            'id',
            'title',
            'short_content',
        ]);
    }

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public function scopeListing($query)
    {
        return $query->published()->orderBy('updated_at', 'DESC');
    }

    public function scopePaginatedListing($query)
    {
        return $query->listing()->paginate();
    }
}
