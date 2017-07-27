<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_product extends Model
{
    //
	protected $table = "type_product";
	public $timestamps = true;

	public function product()
	{
		return $this->hasMany('App\product','id_product','id');
	}
}
