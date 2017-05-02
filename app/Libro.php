<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';

    protected $fillable = ['nombre', 'prize', 'categoria_id', 'autor_id'];
    
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function autor()
    {
        return $this->belongsTo('App\Autor');
    }
}
