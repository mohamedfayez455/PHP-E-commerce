	<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;

class Product_Photo extends Model
{

    protected $table = 'product_photos' ;

    protected $fillable = [

        'photos',
        'product_id',

    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
