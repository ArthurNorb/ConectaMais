<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RedeSocial extends Model
{
    use HasFactory;

    public $table = 'redes_socias';

    protected $fillable = [
        'id',
        'nome',
        'link',
    ];

    protected $casts = [
        'created_at' => 'datetime', 
        'updated_at' => 'datetime',
    ];

    public function pessoas(): HasOne {
        return $this->hasOne(Pessoa::class, 'pessoas_id', 'id');
    }
}
