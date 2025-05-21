<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use SoftDeletes;

    protected $table = 'cursos';
    protected $fillable = ['nome', 'sigla', 'total_horas', 'nivel_id', 'eixo_id'];

    public function niveis(){
        return $this->belongsTo(Nivel::class)->withTimestamps();
    }
    
    public function eixos(){
        return $this->belongsTo(Eixo::class)->withTimestamps();
    }
    
    public function categorias(){
        return $this->hasMany(Categoria::class)->withTimestamps();
    }
    
    public function turmas(){
        return $this->hasMany(Turma::class)->withTimestamps();
    }

    public function alunos(){
        return $this->hasMany(Aluno::class)->withTimestamps();
    }
}
