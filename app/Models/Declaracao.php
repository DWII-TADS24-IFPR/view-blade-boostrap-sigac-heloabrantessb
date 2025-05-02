<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Declaracao extends Model
{
    use SoftDeletes;

    protected $table = 'declaracoes';
    protected $fillable = ['hash', 'data'];

    public function alunos(){
        return $this->belongsTo(Aluno::class)->withTimestamps();
    }

    public function comprovantes(){
        return $this->belongsTo(Comprovantes::class)->withTimestamps();
    }
}
