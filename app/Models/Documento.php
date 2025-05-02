<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use SoftDeletes;

    protected $table = 'documentos';
    protected $fillable = ['url', 'horas_in', 'status', 'comentario', 'horas_out'];

    public function categorias(){
        return $this->belongsTo(Categoria::class)->withTimestamps();
    }
}
