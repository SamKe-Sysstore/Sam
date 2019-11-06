<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\About;

class AboutController extends Controller
{
    //
	public function index ()
	{
		//...
		$about = About::find(1);
		$website = Website::find(1);
		return view('frontend.about', compact('about', 'website'));
	}
}
