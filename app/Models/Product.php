<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CosmeticLine;
use App\Models\Specificproduct;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'ProId';
    protected $filllable = ['ProId', 'ProName', 'LineId', 'Description'];

    public  function cosmeticline(){

        return $this->belongsTo(CosmeticLine::class,'LineId','LineId');
    }

    public function specificproduct()
    {
        return $this->hasMany(Specificproduct::class,'ProId','ProId');
    }
}
