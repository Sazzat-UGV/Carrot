<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function childcategory()
    {
        return $this->belongsTo(Childcategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function pickup_point()
    {
        return $this->belongsTo(PickupPoint::class);
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

}
