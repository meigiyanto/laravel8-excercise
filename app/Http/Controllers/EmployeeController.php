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

		public function show($id)
		{
			$employee = Employee::find($id);
			return view('employee/show', compact('employee'));
		}

    public function fprint()
    {
	    $employee 	= Employee::all();
	    $pdf 		= PDF::loadview('employee/employee_pdf',['employee'=>$employee]);
	    return $pdf->stream('download');
    }

    public function search(Request $request)
    {
	    $keyword  = $request->search;
	    $employee = Employee::where('nama','like','%'.$keyword.'%')->paginate();

	    return view('employee/index',['employee' => $employee]);
    }

    public function create()
    {
	    return view('employee/create');
    }

    public function store(Request $request)
    {
	    $this->validate($request,[
		    'fullname' => 'required',
				'picture'  => 'image|file|max:1024',
		    'position' => 'required',
		    'age' 	   => 'required',
			  'email'    => 'required',
				'phone'    => 'required',
		    'address'  => 'required'
	    ]);

			$image = $request->file('picture');
			$pictureName = $image->getClientOriginalName();

	    Employee::create([
		    'fullname'  => $request->fullname,
				'picture'   => $pictureName,
		    'position'  => $request->position,
		    'agre' 	    => $request->age,
		    'phone' 	  => $request->phone,
		    'email' 	  => $request->email,
		    'address'	  => $request->address
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
		    'fullname' => 'required',
		    'position' => 'required',
		    'age' 	   => 'required',
			  'email'    => 'required',
				'phone'    => 'required',
		    'address'  => 'required'
	    ]);

	    $employee 			 = Employee::find($id);
	    $employee->fullname	 = $request->fullname;
	    $employee->posistion = $request->position;
	    $employee->age 	   = $request->age;
			$employee->phone 	 = $request->phone;
		  $employee->email 	 = $request->email;
	    $employee->address = $request->address;
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
