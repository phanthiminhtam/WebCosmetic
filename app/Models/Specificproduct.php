<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specificproduct extends Model
{
    use HasFactory;
    protected $table='specificproduct';
    protected $primaryKey = 'SpId';
    protected $filllable = ['ProId', 'SpId', 'Image', 'Measure', 'Type', 'Price', 'StartedDate', 'StopDate', 'Offer', 'Image1', 'Image2'];

    public  function product(){

        return $this->belongsTo(Product::class,'ProId','ProId');
    }
}
