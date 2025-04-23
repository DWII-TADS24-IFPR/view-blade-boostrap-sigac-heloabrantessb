<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;

    protected $table = 'alunos';
    protected $fillable = ['nome', 'cpf', 'email', 'telefone'];

    public function roles(){
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
