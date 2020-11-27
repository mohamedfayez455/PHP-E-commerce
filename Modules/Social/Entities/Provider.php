<?php

namespace Modules\Social\Entities;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';

    protected $fillable = [

        'provider_id',
        'provider',
        'user_id',
    ];
}
