<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    //
    protected $table = "customer";
    public $timestamps = true;

    public function bill()
    {
    	return $this->hasMany('App\bills','id_bill','id');
    }
}
