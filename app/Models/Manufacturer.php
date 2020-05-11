<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $table = 'manufacturers';

    protected $primaryKey = 'manufacturer_id';

    public function SubCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
