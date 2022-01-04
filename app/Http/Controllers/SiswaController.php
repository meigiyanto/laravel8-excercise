<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Siswa;
use Session;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;

use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index()
    {
	    $siswa = Siswa::paginate($perPage = 5, $olumns = ['*'], $pageNum = 'siswa');
	    return view('siswa/index',['siswa'=>$siswa]);
    }
    
    public function export_excel()
    {
	    return Excel::download(new SiswaExport, 'siswa.xlsx');
    }
    
    public function import_excel(Request $request) 
    {
	    $this->validate($request, [
		    'file' => 'required|mimes:csv,xls,xlsx'
	    ]);
	    
	    $file 		= $request->file('file');
	    $nama_file  = $file->getClientOriginalName();
	    $file->move('assets/files',$nama_file);
	    Excel::import(new SiswaImport, public_path('assets/files/'.$nama_file));
	    Session::flash('sukses','Data Siswa Berhasil Diimport!');
	    
	    return redirect('/siswa');
    }
}