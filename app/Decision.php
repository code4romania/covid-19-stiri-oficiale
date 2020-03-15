<?php

namespace App;

use App\Institution;

class Decision extends BaseModel
{
    protected $with = [
        'institution',
        'tags',
    ];

    public function childDraft()
    {
        return $this->hasOne(Decision::class, 'draft_parent_id', 'id');
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
