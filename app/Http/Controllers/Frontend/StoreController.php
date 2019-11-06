<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\Store;
use App\Models\Product;

class StoreController extends Controller
{
    //
	public function index ()
	{
		//...
		$store = Store::find(1);
		$website = Website::find(1);
		$about = About::find(1);
		return view('frontend.store', compact('store', 'website', 'about'));
	}
}
