<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    public function category()
    {
        return $this->hasMany(MotherCategory::class,'mother_category_id','category_id');
    }
}
