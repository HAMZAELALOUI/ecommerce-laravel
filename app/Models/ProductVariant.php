<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    public function productVariantItems()
    {
        return $this->hasMany(ProductVariantItem::class, 'variant_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
