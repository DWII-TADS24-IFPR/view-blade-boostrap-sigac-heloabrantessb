<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;

    protected $table = 'alunos';
    protected $fillable = ['nome', 'cpf', 'email', 'telefone', 'senha', 'curso_id', 'turma_id'];

    public function cursos(){
        return $this->belongsTo(Curso::class);
    }

    public function turmas(){
        return $this->belongsTo(Turma::class);
    }
    public function declaracoes(){
        return $this->hasMany(Declaracao::class)->withTimestamps();
    }
}
