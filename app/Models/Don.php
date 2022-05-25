<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Don extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'user_id',
        'content',
        'date_of_writing',
        'days_off',
        'description',
        ] ;
}
