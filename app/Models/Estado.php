<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    public $table = 'estados';

    protected $fillable = [
        'id',
        'nome',
        'sigla'
    ];

    protected $casts = [
        'created_at' => 'datetime', 
        'updated_at' => 'datetime',
    ];

    
}
