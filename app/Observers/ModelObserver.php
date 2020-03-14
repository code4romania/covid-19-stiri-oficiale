<?php

namespace App\Observers;

use App\BaseModel;

class ModelObserver
{
    /**
     * Handle the base model "created" event.
     *
     * @param  \App\BaseModel  $baseModel
     * @return void
     *
     */

    public function creating( BaseModel $model)
    {
        $errors=[];
        $slug = Str::slug($model->title);
        dd($slug);
        $exists = BaseModel::where("slug",'=',"{$slug}")->first();
        if ($exists) {
            $errors["name"] = "Acest nume este deja folosit";
        }

        if ($errors) {
            throw ValidationException::withMessages($errors);
        }

    }
    public function saving(BaseModel $model)
    {
        dd($model);

        $model->slug = trim(Str::slug($model->title));
        $model->user_id = auth()->user()->id;

    }
}
