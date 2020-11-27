<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Users\Entities\User;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = [

        'review',
        'rate',
        'product_id',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }



}
