<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name'
    ];

    // 1 voter berelasi ke user
    public function user()
    {
       return $this->belongsTo(User::class);
    }
}