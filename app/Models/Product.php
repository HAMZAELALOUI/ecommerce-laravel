<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function imageProductGalleries()
    {
        return $this->hasMany(ImageProductGallery::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function variant()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
