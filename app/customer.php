<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
	protected $table="customers";

    protected $fillable = ['name','email','password','address','contact_no'];

    public function role()
    {
    	return $this->hasMany('App\Role','customer_id');
    }
}
