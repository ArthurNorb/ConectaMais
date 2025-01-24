<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Endereco extends Model
{
    use HasFactory;

    public $table = 'enderecos';

    // atributos (colunas)
    protected $fillable = [
        'id',
        'rua',
        'numero',
        'cidade',
        'cep',
        'estados_id',
    ];

    // timestamps
    protected $casts = [
        'created_at' => 'datetime', 
        'updated_at' => 'datetime',
    ];

    // relação
    public function estados(): HasOne {
        return $this->hasOne(Estado::class, 'estados_id', 'id');
    } 
}
