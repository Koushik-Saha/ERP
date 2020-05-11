<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';

    protected $primaryKey = 'sub_category_id';

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function SubCategory()
    {
        return $this->hasMany(Manufacturer::class);
    }
}
