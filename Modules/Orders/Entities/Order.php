<?php

namespace Modules\Orders\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Products\Entities\Product;
use Modules\Users\Entities\User;

class Order extends Model
{

    protected $table = 'orders';

    protected $fillable = [

        'total',
        'date',
        'state',
        'user_id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class , 'product_orders' , 'order_id' , 'product_id')
            ->withPivot(['quantity']);
    }

    public function user()
    {
        return $this->belongsTo(User::class );
    }

}
