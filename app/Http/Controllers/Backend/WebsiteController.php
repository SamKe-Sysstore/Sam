<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Website;

class WebsiteController extends Controller
{
	//
    public function edit()
	{
		$website = Website::find(1);
		if (empty($website))
			return view('backend.website.edit');
		else 
			return view('backend.website.edit', compact('website'));
	}
	public function update(Request $request)
	{
		// �]���S���S�O�إ�create�����A�ҥH�S�O�P�_��Ʈw���O�_����ƥi�H��s
		$website = Website::find(1);
		if (empty($website)) {
			// �S����� -> �s�W
			$website = new Website;
		}
		$website->title = $request->input('title');
		$website->subtitle = $request->input('subtitle');
		$website->footer = $request->input('footer');
		$website->save();
		return redirect()->route('admin.website.edit');
	}
}
