<?php

namespace App\Traits;

trait Slug
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            try {
                $model->slug = str_slug($model->name.' '.random_int(100000, 999999), '_');
            } catch (\Exception $e) {
                abort(500, $e->getMessage());
            }
        });
    }
}
