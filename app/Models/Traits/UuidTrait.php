<?php

namespace App\Models\Traits;
use Illuminate\Support\Str;

trait UuidTrait
{
    // automizando o uuid
    public static function booted()
    {
        static::creating(function($model){
            $model->{$model->getKeyName()} = (String) Str::uuid();
        });

    }
}