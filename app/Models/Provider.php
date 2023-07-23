<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    protected $table = 'provider';
    protected $primaryKey = 'PrvId';
    protected $filllable = ['PrvId', 'PrvName', 'Address', 'PhoneNumber', 'Email'];
}
