<?php

namespace Modules\Departments\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Products\Entities\Product;

class Department extends Model
{
    protected $table = 'departments';

    protected $append = ['image_path'];

    protected $fillable = [
        'name',
        'desc',
        'photo',
        'parent_id',
    ];

    public function parent_id()
    {
        return $this->hasMany(Department::class );
    }

    public function getImagePathAttribute()
    {
        return asset('uploads/departments/' . $this->photo);
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
