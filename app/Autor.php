<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    //
    protected $table = 'autores';
    protected $fillable = ['name_autor'];
    
    public function libros()
    {
        return $this->hasMany('App\Libro');
    }
}
