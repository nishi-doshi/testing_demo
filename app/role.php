<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class role extends Model
{
    protected $table="roles";

    protected $fillable = ['name','customer_id'];

	public function customer()
    {
    	return $this->belongsTo('App\customer');
    }
    
}
 