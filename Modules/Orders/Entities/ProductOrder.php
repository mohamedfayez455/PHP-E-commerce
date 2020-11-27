<?php

namespace Modules\Orders\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $table = 'product_orders';

    protected $fillable = [

        'product_id',
        'order_id',
        'quantity',

    ];
}
