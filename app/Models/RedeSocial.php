<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeSocial extends Model
{
    use HasFactory;
    protected $table = 'redes_sociais';

    // Campos que podem ser preenchidos em massa (não inclua 'id')
    protected $fillable = [
        'id',
        'nome',
        'link',
        'pessoa_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id');
    }
}
