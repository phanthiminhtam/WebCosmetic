<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table ='staff';
    protected $primaryKey = 'StaffId';
    protected $filllable = ['StaffId', 'StaffName', 'Address', 'PhoneNumber', 'Email', 'Post', 'BasicSalary',
    'StartDate', 'TypeWork', 'ContractWork'];
}
