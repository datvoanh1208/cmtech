<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bills extends Model
{
    //
    protected $table = "bills";
    public $timestamps = true;

    public function customer()
    {
    	return $this->belongsTo('App\customer','id_customer','id');
    }

    public function billdetail()
    {
    	return $this->hasMany('App\bill_detail','id_bill','id');
    }
}
