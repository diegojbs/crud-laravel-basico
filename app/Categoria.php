<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $table = 'categorias';

    protected $fillable = ['name_categoria'];

    public function libros()
    {
        return $this->hasMany('App\Libro');
    }
}
