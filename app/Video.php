<?php

namespace App;

use App\Institution;
use Embed\Adapters\Adapter;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Searchable;
use Leewillis77\CachedEmbed\CachedEmbed;
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

    public static function booted()
    {
        static::addGlobalScope(fn (Builder $query) => $query->published());
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

    private function embedObject(): ?Adapter
    {
        if (!$this->url) {
            return null;
        }

        try {
            return CachedEmbed::create($this->url);
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function getEmbedCodeAttribute(): ?string
    {
        return $this->embedObject()->code ?? null;
    }

    public function getEmbedImageAttribute(): ?string
    {
        return $this->embedObject()->image ?? null;
    }
}
