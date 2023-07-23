<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\Authenticatable;

class Customer extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table='customer';
    protected $primaryKey = 'CusId';
    // protected $filllable = ['CusId', 'CusName', 'PhoneNumber', 'Address', 'Email', 'UserName', 'PassWord', 'Active'];
    // public function review()
    // {
    //     return $this->hasMany(Customer::class);
    // }
    protected $fillable = [
        'CusName',
        'PhoneNumber',
        'Address',
        'UserName',
        'Email',
        'PassWord'
    ];

    protected $hidden = [
        'PassWord',
        'remember_token'
    ];
}
