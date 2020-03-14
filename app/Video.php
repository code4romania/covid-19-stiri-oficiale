<?php

namespace App;

use App\Institution;
use Illuminate\Database\Eloquent\Model;

class Video extends BaseModel
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        if (auth()->user()) {
            $this->user_id = auth()->user()->id;
        }
    }
    protected $with = ['institution'];


    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
