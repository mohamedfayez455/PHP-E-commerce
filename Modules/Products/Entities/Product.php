<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Departments\Entities\Department;

class Product extends Model
{
    protected $table = 'products';

    protected $appends = ['image_path'];

    protected $fillable = [
        'name',
        'desc',
        'price',
        'size',
        'color',
        'state',
        'photo',
        'photos',
        'department_id',
    ];


    public function getImagePathAttribute()
    {
        return asset('uploads/products/' . $this->photo);

    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }


    public function photos()
    {
        return $this->hasMany(product_photo::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }


    public function orders()
    {
        return $this->belongsToMany(Product::class , 'product_orders' ,'product_id', 'order_id' );
    }


}
