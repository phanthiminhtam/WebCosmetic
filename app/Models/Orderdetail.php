<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $table = 'oderdetail';
    //protected $primaryKey = ['OrdId','SpId'];
    protected $filllable = ['Quantity', 'Price', 'OrdId', 'SpId'];

    public  function order(){
        return $this->belongsTo(Order::class,'OrdId','OrdId');
    }
    public  function specificproduct(){
        return $this->belongsTo(Specificproduct::class,'SpId','SpId');
    }
}
