<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\Models\Media;


class NewsInfo extends BaseModel {
    public function __construct (array $attributes = [])
    {
        parent::__construct($attributes);
        $this->user_id=auth()->user()->id;
        $this->user_id=auth()->user()->id;
        $this->slug=Str::slug($this->title);
    }


    public function fromresource ()
    {
        return $this->belongsTo(FromResource::class,'from_resource_id','id');
    }

}
