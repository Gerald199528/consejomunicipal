<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagens extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
