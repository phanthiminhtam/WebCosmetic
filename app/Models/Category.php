<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CosmeticLine;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'CatId';
    protected $filllable = ['CatId','CatName', 'Description'];

    public function cosmeticline()
    {
        return $this->hasMany(CosmeticLine::class,'CatId','CatId');
    }
}
