<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    
    protected $table = 'roles';
    protected $fillable = ['titulo'];

    
    public function alunos(){
        return $this->belongsToMany(Aluno::class);
    }
}
