<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUuids 
{
    protected static function boot() {
        parent::boot();
        static::creating(function($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid();
            }
        });
    }
}