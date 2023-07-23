<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class CosmeticLine extends Model
{
    use HasFactory;
    protected $table = 'cosmeticline';
    protected $primaryKey = 'LineId';
    protected $filllable = ['LineId','LineName','CatId','Brand','Origin'];

    public  function category(){
        return $this->belongsTo(Category::class,'CatId','CatId');
    }

    public function product()
    {
        return $this->hasMany(Product::class,'LineId','LineId');
    }
}
