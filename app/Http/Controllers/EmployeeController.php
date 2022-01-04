<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
	    $employee = Employee::paginate($perPage = 10, $olumns = ['*'], $pageNum = 'employee');
	    return view('employee/index',['employee' => $employee]);
    }
    
    public function fprint()
    {
	    $employee 	= Employee::all();
	    $pdf 		= PDF::loadview('employee/employee_pdf',['employee'=>$employee]);		
	    return $pdf->stream('download');
    }
    
    public function search(Request $request)
    {
	    $temukan    = $request->search;
	    $employee = Employee::where('nama','like','%'.$temukan.'%')->paginate();
    
	    return view('employee/index',['employee' => $employee]);
    }
    
    public function create()
    {
	    return view('employee/create');
    }
    
    public function store(Request $request)
    {
	    $this->validate($request,[
		    'nama' 	  => 'required',
		    'jabatan' => 'required',
		    'umur' 	  => 'required',
			'email'   => 'required',
		    'alamat'  => 'required'
	    ]);
	    
	    Employee::create([
		    'nama' 	   => $request->nama,
		    'pekerjaan' => $request->pekerjaan,
		    'telepon' 	=> $request->telepon,
		    'email' 	=> $request->email,
		    'alamat' 	=> $request->alamat
	    ]);
	    return redirect('/employee');
    }
    
    public function edit($id)
    {
	    $employee = Employee::where('id',$id)->get();
	    return view('employee/edit',['employee' => $employee]);
    }
    
    public function update(Request $request)
    {
	    $this->validate($request,[
		    'nama' 	    => 'required',
		    'pekerjaan' => 'required',
		    'telepon'   => 'required',
			'email' 	=> 'required',
		    'alamat'    => 'required'
	    ]);
	    
	    $employee 			 = Employee::find($id);
	    $employee->nama 	 = $request->nama;
	    $employee->pekerjaan = $request->pekerjaan;
	    $employee->telepon 	 = $request->telepon;
		$employee->email 	 = $request->email;
	    $employee->alamat 	 = $request->alamat;
	    $employee->save();
	    return redirect('/employee');
    }
    
    public function destroy($id)
    {
	    $employee = Employee::where('id',$id);
	    $employee->delete();
	    return redirect('/employee');
    }
}