<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;
use File;

class MultipleUploadController extends Controller
{
  public function upload()
  {
		$picture = Picture::paginate($perPage = 9, $olumns = ['*'], $pageNum = 'picture');
		return view('upload/index',['picture' => $picture]);
	}

	public function proses_upload(Request $request)
	{
		$request->validate([
			'images'   => 'required',
			'images.*' => 'mimes:jpeg,jfif,jpg,png,gif,csv,txt,pdf|max:2048'
		]);
		$images = $request->file('images');
		foreach($images as $image) {
			$name = $image->getClientOriginalName();
			$path = $image->move('assets/images', $image->getClientOriginalName());

			Picture::create([
				'name' => $name,
				'descriptions' => $request->descriptions,
				'image_path' => $path
			]);
		}
		return redirect()->back();
	}

	public function destroy($id)
	{
		$picture = Picture::where('id',$id)->first();
		File::delete('assets/images/'.$picture->name);
		Picture::where('id',$id)->delete();
		return redirect()->back();
	}
}
