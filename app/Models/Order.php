<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='order';
    protected $primaryKey = 'OrdId';
    protected $filllable = ['OrdId', 'CusId', 'ReceivingAddress', 'Status', 'Note', 'MoneyTotal', 'OrderDate', 'PhoneNumber', 'Payment'];
    public function orderdetail()
    {
        return $this->hasMany(Orderdetail::class,'OrdId','OrdId');
    }
}
