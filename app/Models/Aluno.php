<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;

    protected $table = 'alunos';
    protected $fillable = ['nome', 'cpf', 'email', 'telefone'];

    public function cursos(){
        return $this->belongsTo(Curso::class)->withTimestamps();
    }

    public function turmas(){
        return $this->belongsTo(Turma::class)->withTimestamps();
    }
    
    public function alunos(){
        return $this->hasMany(Aluno::class)->withTimestamps();
    }
    
    public function declaracoes(){
        return $this->hasMany(Declaracao::class)->withTimestamps();
    }
}
