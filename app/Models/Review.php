<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table='review';
    protected $primaryKey = 'ReviewId';
    protected $fillable =['ReviewId', 'Email', 'Content', 'Vote', 'CreateDate', 'Status', 'PhoneNumber', 'CusId'];

    public  function customer(){
        return $this->belongsTo(Customer::class,'CusId','CusId');
    }
}
