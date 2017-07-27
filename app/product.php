<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $table = "product";
    public $timestamps = true;

    public function billdetail()
    {
    	return $this->belongsTo('App\bill_detail','id_product','id');
    }

    public function typeproduct()
    {
    	return $this->belongsTo('App\type_product','id_type','id');
    }

   public function comment()
    {
        return $this->hasMany('App\Comment','idSanPham','id');
    }

}
