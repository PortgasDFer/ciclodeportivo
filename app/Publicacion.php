<?php

namespace LaGranLinea;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Publicacion extends Model

{

	use Taggable;

    protected $table = 'publicaciones';
    protected $dates = ['fecha'];


     public function scopeSearch($query, $palabra) {
        return $query
            ->where('titulo', 'like', "%" . $palabra . "%")
            ->orWhere('subtitulo', 'like', "%" . $palabra . "%");
    }
}
