<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pessoa extends Model
{
    use HasFactory;

    public $table = 'pessoas';

    protected $fillable = [
        'id',
        'nome',
        'sobrenome',
        'apelido',
        'email',
        'avatar',
        'birthday',
        'celular',
        'fixo',
        'enderecos_id',
        'users_id',
    ];

    protected $casts = [
        'created_at' => 'datetime', 
        'updated_at' => 'datetime',
    ];

    public function enderecos(): HasOne {
        return $this->hasOne(Endereco::class, 'enderecos_id', 'id');
    }

    public function redesSociais() : HasMany {
        return $this->hasMany(RedeSocial::class, 'pessoas_id', 'id');
    }

    protected $guarded = [];
}
