<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class M_Blog extends Model
{
    use SoftDeletes;
    protected $table = 'blog';
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'image'
    ];
    protected $hidden;
    
}
