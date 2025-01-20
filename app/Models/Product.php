<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=['id'];


    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function warehouse(){
        return $this->belongsTo( Warehouse::class);
    }
    public function pickup_point(){
        return $this->belongsTo( PickupPoint::class,'pickup_point_id');
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
