<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use PDF;

class EmployeeController extends Controller
{
    public function index()
    {
	    $employee = Employee::paginate($perPage = 10, $olumns = ['*'], $pageNum = 'Employee');
	    return view('employee/index',['employee' => $employee]);
    }
    
    public function fprint()
    {
	    $employee 	= Employee::all();
	    $pdf 		= PDF::loadview('employee/employee_pdf',['employee'=>$employee]);		
	    return $pdf->stream('download');
	    
	    /**
	    * Option 1 : Strike Download
	    * $pdf = PDF::loadview('Employee/Employee_pdf',['Employee'=>$Employee]);
	    * return $pdf->download('laporan-Employee-pdf.pdf');
	    */
	    
	    /**
	    * Option 2 : Show on Browser
	    * $pdf = App::make('dompdf.wrapper');
	    * $pdf->loadHTML('<h1>Test</h1>');
	    * return $pdf->stream();
	    */
    }
    
    public function search(Request $request)
    {
	    $search    = $request->search;
	    // $Employee = DB::table('Employee')
	    //			->where('Employee_nama','like',"%".$cari."%")
	    //			->paginate();
	    
	    /* Eloquent */
	    $employee = Employee::where('Employee_nama','like','%'.$cari.'%')->paginate();
    
	    return view('employee/index',['employee' => $employee]);
    }
    
    public function create()
    {
	    return view('employee/create');
    }
    
    public function store(Request $request)
    {
	    /*
	    DB::table('Employee')->insert([
	    'Employee_nama' => $request->nama,
	    'Employee_jabatan' => $request->jabatan,
	    'Employee_umur' => $request->umur,
	    'Employee_alamat' => $request->alamat
	    ]);
	    */
	    
	    /* Eloquent */
	    $this->validate($request,[
		    'nama' 	  => 'required',
		    'jabatan' => 'required',
		    'umur' 	  => 'required',
		    'alamat'  => 'required'
	    ]);
	    
	    Employee::create([
		    'employee_nama' 	=> $request->nama,
		    'employee_jabatan' 	=> $request->jabatan,
		    'employee_umur' 	=> $request->umur,
		    'employee_alamat' 	=> $request->alamat
	    ]);
	    return redirect('/employee');
    }
    
    public function edit($id)
    {
	    // $Employee = DB::table('Employee')->where('Employee_id',$id)->get();
	    $employee = Employee::where('employee_id',$id)->get();
	    return view('employee/edit',['employee' => $employee]);
    }
    
    public function update(Request $request)
    {
	    /*
	    DB::table('Employee')->where('Employee_id',$request->id)->update([
		    'Employee_nama' 		=> $request->nama,
		    'Employee_jabatan' 	=> $request->jabatan,
		    'Employee_umur' 		=> $request->umur,
		    'Employee_alamat' 	=> $request->alamat
	    ]);
	    */
	    
	    /* Eloquent */
	    $this->validate($request,[
		    'nama' 	  => 'required',
		    'jabatan' => 'required',
		    'umur' 	  => 'required',
		    'alamat'  => 'required'
	    ]);
	    
	    $employee 			= Employee::find($id);
	    $employee->nama 	= $request->nama;
	    $employee->jabatan 	= $request->jabatan;
	    $employee->umur 	= $request->umur;
	    $employee->alamat 	= $request->alamat;
	    $employee->save();
	    return redirect('/employee');
    }
    
    public function destroy($id)
    {
	    // DB::table('Employee')->where('Employee_id',$id)->delete();
	    /* Eloquent */
	    $employee = Employee::where('employee_id',$id);
	    $employee->delete();
	    return redirect('/employee');
    }
}