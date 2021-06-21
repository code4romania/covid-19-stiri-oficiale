<?php

namespace App;

use App\Helpers\Normalize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BaseModel extends Model implements HasMedia
{
    use InteractsWithMedia, SoftDeletes;

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

    public function scopePublished($query)
    {
        $table = $this->getTable();

        return $query->where("$table.published", 1);
    }

    public function scopeListing($query)
    {
        return $query
            ->select([
                'id',
                'slug',
                'title',
                'short_content',
                'created_at',
                'updated_at',
                'institution_id',
            ])
            ->published()
            ->orderByDesc('updated_at');
    }

    public function scopePaginatedListing($query)
    {
        return $query->listing()->paginate();
    }

    public function scopeWithoutEagerLoading($query)
    {
        return $query->without($this->with);
    }

    /**
     * Get the normalized indexable data array for the model.
     *
     * This removes html tags,
     *
     * @return array
     */
    public function toSearchableArray()
    {
        if (!isset($this->searchableFields)) {
            return [];
        }

        return collect($this->only($this->searchableFields))
            ->map(fn ($field): string => Normalize::string($field))
            ->toArray();
    }

    public function next(): ?self
    {
        return Cache::driver('array')->rememberForever('next-'. $this->getMorphClass(). '-'. $this->id, function () {
            return $this
                ->withoutEagerLoading()
                ->select('id', 'title', 'slug')
                ->where('updated_at', '>', $this->updated_at)
                ->orderBy('updated_at', 'asc')
                ->first();
        });
    }

    public function previous(): ?self
    {
        return Cache::driver('array')->rememberForever('prev-'. $this->getMorphClass(). '-'. $this->id, function () {
            return $this
                ->withoutEagerLoading()
                ->select('id', 'title', 'slug')
                ->where('updated_at', '<', $this->updated_at)
                ->orderBy('updated_at', 'desc')
                ->first();
        });
    }
}
