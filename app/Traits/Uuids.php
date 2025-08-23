<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Uuids
{
    protected static function bootUuids()
    {
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid()->toString();
            }
        });
    }
}
