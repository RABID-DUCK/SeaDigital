<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = false;

    public function images(){
        return $this->hasMany(ProductImages::class, 'product_id', 'id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_products', 'product_id', 'category_id');
    }

    public function getImageUrlAttribute(){
        return url('storage/' . $this->preview_image);
    }
}
