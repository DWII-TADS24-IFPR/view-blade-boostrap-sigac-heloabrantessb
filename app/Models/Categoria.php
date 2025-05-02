<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;

    protected $table = 'categorias';
    protected $fillable = ['nome', 'maximo_horas']
    
    public function cursos(){
        return $this->belongsTo(Curso::class)->withTimestamps();
    }
    
    public function comprovantes(){
        return $this->hasMany(Comprovante::class)->withTimestamps();
    }
    
    public function documentos(){
        return $this->hasMany(Documento::class)->withTimestamps();
    }
}
