<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
	protected $table = 'my_products';
	protected $primarykey = "my_id";
	public $timestamps = true;
	
}
