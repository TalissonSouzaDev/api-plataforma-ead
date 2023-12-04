<?php

namespace App\Models\Traits;
use Illuminate\Support\Str;

trait UuidTrait
{
    // automizando o uuid
    public static function booted()
    {
        static::creatind(function($model){
            $model->{$model->getKeyName()} = (String) Str::uuid();
        });

    }
}