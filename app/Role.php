<?php

namespace LaGranLinea;

use LaGranLinea\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
	{
	    return $this
	        ->belongsToMany('LaGranLinea\User')
	        ->withTimestamps();
	}
}
