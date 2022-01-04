<?php

namespace App\Http\Controllers;
use Session;

use App\Models\Student;

use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
	{
		$student = Student::paginate($perPage = 10, $olumns = ['*'], $pageNum = 'student');
		return view('student/index',['student'=>$student]);
	}
 
	public function export_excel()
	{
		return Excel::download(new StudentExport, 'student.xlsx');
	}
 
	public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_student di dalam folder public
		$file->move('file_student',$nama_file);
 
		// import data
		Excel::import(new StudentImport, public_path('/file_student/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data student Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/student');
	}
}
