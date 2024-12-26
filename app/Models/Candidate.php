<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'chairman',
        'vice_chairman',
        'vision',
        'mission',
        'sort_order'
    ];

    // 1 candidate dapat memiliki banyak vote
    public function votes()
    {
       return $this->hasMany(Vote::class);
    }
}
