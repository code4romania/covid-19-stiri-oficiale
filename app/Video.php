<?php

namespace App;

use App\Institution;
use Spatie\Feed\FeedItem;
use Spatie\Feed\Feedable;

class Video extends BaseModel implements Feedable
{
    protected $with = [
        'institution',
        'tags',
    ];

    public function childDraft()
    {
        return $this->hasOne(Video::class, 'draft_parent_id', 'id');
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function toFeedItem()
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
}
