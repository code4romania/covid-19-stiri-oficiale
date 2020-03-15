<?php

namespace App;

use App\Institution;

class News extends BaseModel
{
    protected $with = [
        'institution',
        'tags',
    ];

    public function childDraft()
    {
        return $this->hasOne(News::class, 'draft_parent_id', 'id');
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
