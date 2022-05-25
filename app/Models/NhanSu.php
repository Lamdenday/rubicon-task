<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NhanSu extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'number',
        'image',
        'DOB',
        'level',
        'status'
    ];

    public function users ():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
