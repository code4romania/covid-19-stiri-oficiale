<?php

namespace App;

use App\Institution;
use Embed\Embed;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Laravel\Scout\Searchable;
use Spatie\Feed\FeedItem;
use Spatie\Feed\Feedable;

class Video extends BaseModel implements Feedable
{
    use Searchable;

    /** @var array<string> */
    protected $guarded = [];


    protected $with = [
        'institution',
        'tags',
    ];

    /** @var array<string> */
    protected $searchableFields = [
        'id',
        'title',
        'short_content',
    ];

    protected string $embedCacheStore = 'file';

    public static function booted()
    {
        static::updated(fn (self $model) => Cache::store($model->embedCacheStore)->forget("video-embed-{$model->id}"));
        static::deleted(fn (self $model) => Cache::store($model->embedCacheStore)->forget("video-embed-{$model->id}"));
    }

    public function childDraft()
    {
        return $this->hasOne(Video::class, 'draft_parent_id', 'id');
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function toSearchableArray()
    {
        return parent::toSearchableArray();
    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->short_content)
            ->updated($this->updated_at)
            // Not currently using dedicated video pages,
            // so we redirect to index
            ->link(route('videos.index'))
            ->author($this->institution->name);
    }

    public function getFeedItems()
    {
        return Video::listing()->get();
    }

    private function embedObject(): ?object
    {
        if (!$this->url) {
            return null;
        }

        return Cache::store($this->embedCacheStore)->rememberForever("video-embed-{$this->id}", function () {
            try {
                $data = (new Embed)->get($this->url);

                return (object) [
                    'code'  => optional($data->code)->html,
                    'image' => $data->image,
                ];
            } catch (\Throwable $exception) {
                return null;
            }
        });
    }

    public function getEmbedCodeAttribute(): ?string
    {
        return optional($this->embedObject())->code;
    }

    public function getEmbedImageAttribute(): ?string
    {
        return optional($this->embedObject())->image;
    }
}
