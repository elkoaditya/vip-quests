<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

trait Createdby
{
    protected static function bootCreatedby()
    {
        static::creating(function ($model) {
            // create auto project_id
            if (empty($model->created_by)) {
                $model->created_by = Auth::user()->id;
            }
        });
    }
}
