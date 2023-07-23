<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $primaryKey = 'NewId';
    protected $filllable = ['NewId', 'Title', 'Content', 'UserId', 'PublicDate', 'Image'];


    public function user()
    {
        return $this->hasMany(News::class);
    }
}
