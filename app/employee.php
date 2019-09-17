<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
	protected $table="employees";

	protected $fillable = ['name','email','password','address','contact_no','customer_id'];
    public function customer()
    {
    	return $this->belongsTo('App\customer','customer_id');
    }

    public function test()
    {
    	return $this->belongsTo('App\test','test_id');
    }
}
