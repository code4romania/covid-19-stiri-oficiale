<?php

namespace App\Observers;

use App\FromResource;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class FromResourceObserver
{
    /**
     * Handle the from resource "created" event.
     *
     * @param  \App\FromResource  $fromResource
     * @return void
     */
    public function creating( FromResource $fromResource)
    {
        $errors=[];
        $slug = Str::slug($fromResource->name);
        $exists = FromResource::where("slug",'=',"{$slug}")->first();
        if ($exists) {
            $errors["name"] = "Acest nume este deja folosit";
        }

        if ($errors) {
            throw ValidationException::withMessages($errors);
        }

    }

    public function saving(FromResource $fromResource)
    {

        $fromResource->slug = trim(Str::slug($fromResource->title));

    }

}
