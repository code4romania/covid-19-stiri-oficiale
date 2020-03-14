<?php

namespace App;

use App\Institution;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Decision extends BaseModel
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (auth()->user()) {
            $this->user_id = auth()->user()->id;
        }
    }

    protected $with = ['institution'];

    public function childDraft()
    {
        return $this->hasOne(Decision::class, 'draft_parent_id', 'id');
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
