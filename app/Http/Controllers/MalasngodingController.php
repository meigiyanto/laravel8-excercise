<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MalasngodingController extends Controller
{
    public function input()
    {
        return view('input');
    }

    public function proses(Request $request)
    {
    	$messages = [
	    	'required' => ':attribute wajib diisi cuy!!!',
	    	'min' => ':attribute harus diisi minimal :min karakter ya cuy!!!',
	    	'max' => ':attribute harus diisi maksimal :max karakter ya cuy!!!',
    	];
        $this->validate($request,[
           'nama' 		=> 'required|min:5|max:20',
           'pekerjaan'  => 'required',
           'usia' 		=> 'required|numeric'
        ]);

        return view('proses',['data' => $request]);
    }
}