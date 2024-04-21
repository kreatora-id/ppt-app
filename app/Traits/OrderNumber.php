<?php

namespace App\Traits;

use Carbon\Carbon;

trait OrderNumber
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            try {
                $model->order_number = 'SL'.Carbon::now()->format('ymd').random_int(100000, 999999);
            } catch (\Exception $e) {
                abort(500, $e->getMessage());
            }
        });
    }
}
