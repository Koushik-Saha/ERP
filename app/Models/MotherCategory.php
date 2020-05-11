<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MotherCategory extends Model
{
    protected $table = 'mother_categories';

    protected $primaryKey = 'mother_category_id';

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','mother_category_id');
    }
}
