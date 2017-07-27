<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill_detail extends Model
{
    //
    protected $table = "bill_detail";
    public $timestamps = true;

    public function bills()
    {
    	return $this->belongsTo('App\bills','id_bill','id');
    }

    public function product()
    {
    	return $this->belongsTo('App\product','id_product','id');
    }
}
