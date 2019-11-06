<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    //
	public function edit()
	{
		$about = About::find(1);
		if (empty($about))
			return view('backend.about.edit');
		else
			return view('backend.about.edit', compact('about'));
	}
	public function update(Request $request)
	{
		// �p�G���|���s�b�A�N�۰ʫإ�
		if (!file_exists('uploads/about')) {
			mkdir('uploads/about', 0755, true);
		}
		// �]���S���S�O�إ�create�����A�ҥH�S�O�P�_��Ʈw���O�_����ƥi�H��s
		$about = About::find(1);
		if (empty($about)) {
			// �S����� -> �s�W
			$about = new About;
			$fileName = 'default.jpg';
		} 
		if ($request->hasFile('image')) {
			// ���R���쥻���Ϥ�
			if ($about->image != 'default.jpg')
				@unlink('uploads/about/' . $about->image);
			$file = $request->file('image');
			$path = public_path() . '\uploads\about\\';
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->move($path, $fileName);
		}
		$about->content = $request->input('content');
		if ($fileName)
			$about->image = $fileName;
		$about->save();
		return redirect()->route('admin.about.edit');
	}
}
