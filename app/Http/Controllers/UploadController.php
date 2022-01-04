<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;
use File;

class UploadController extends Controller
{
    public function upload() 
    {
		// return view('upload/index');
		$picture = Picture::get();
		return view('upload/index',['picture' => $picture]);
	}
 
	public function proses_upload(Request $request) 
	{
		$this->validate($request, [
			'file' 		 => 'required',
			'keterangan' => 'required',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		// $file = $request->file('file');
 
      	// nama file
		// echo 'File Name: '.$file->getClientOriginalName();
		// echo '<br>';
 
      	// ekstensi file
		// echo 'File Extension: '.$file->getClientOriginalExtension();
		// echo '<br>';

		// real path
		// echo 'File Real Path: '.$file->getRealPath();
		// echo '<br>';
 
        // ukuran file
		// echo 'File Size: '.$file->getSize();
		// echo '<br>';
 
      	// tipe mime
		// echo 'File Mime Type: '.$file->getMimeType();
 
      	// isi dengan nama folder tempat kemana file diupload
		// $tujuan_upload = 'data_file';
		
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
		
		$nama_file = $file->getClientOriginalName();
		
		// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'assets/images';

        // upload file
		$file->move($tujuan_upload, $file->getClientOriginalName());
		Picture::create([
			'file' 		 => $nama_file,
			'keterangan' => $request->keterangan,
		]);
		
		return redirect()->back();
	}
	
	public function hapus($id)
	{
		$picture = Picture::where('id',$id)->first();
		File::delete('assets/images/'.$picture->file);
		
		Picture::where('id',$id)->delete();
		return redirect()->back();
	}
}