<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Employee;

class EmployeeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
		$employee = Employee::paginate($perPage = 10, $columns = ['*'], $pageNum = 'employee');
    return view('employees/index',['employee' => $employee]);
  }

  /**
   * Show the form for creating a new
   * resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('employees/create');
  }

  /**
   * Store a newly created resource in
	 * storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validData = $request->validate([
	    'fullname' => 'required',
			'picture'  => 'image|file|max:1024',
	    'position' => 'required',
	    'age' 	   => 'required',
		  'email'    => 'required|email|unique:employees',
			'phone'    => 'numeric|min:12',
			'address'  => 'required'
    ]);

		if (!$validData) {
    	return redirect('employee/create')
             ->withErrors($validData)
             ->withInput();
    }

		if($request->file('picture')) {
	 		$validData['picture'] = $request->file('picture')->store('images');
		}

    Employee::create($validData);
		return redirect('/employees')->with('success', 'Employee has been created successfully!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $employee = Employee::find($id);
		return view('employees/show', compact('employee'));
  }

  public function fprint()
  {
    $employee = Employee::all();
    $pdf = PDF::loadview('employees/employee_pdf', ['employee'=>$employee]);
    return $pdf->stream('download');
  }

  /**
   * Show the form for editing the
	 * specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $employee = Employee::find($id);
    return view('employees/edit',['employee' => $employee]);
  }

  /**
   * Update the specified resource
	 * in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $validData = $request->validate([
	    'fullname' => 'required',
			'picture'  => 'image|file|max:1024',
	    'position' => 'required',
	    'age' 	   => 'required',
		  'email'    => 'required|email',
			'phone'    => 'numeric|min:12',
			'address'  => 'required'
    ]);

		if (!$validData) {
    	return redirect('employees/edit/'.$id)               ->withErrors($validData)
             ->withInput();
    }

		if($request->file('picture')) {
			if($request->oldpicture) {
    		Storage::delete($request->oldpicture);
			}

	 		$validData['picture'] = $request->file('picture')->store('images');
		}

    Employee::where('id', $id)->update($validData);
		return redirect('/employees')->with('success', 'Employee has been updated successfully!');
  }

  /**
   * Remove the specified resource
	 * from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Employee $employee)
  {
		if($employee->picture) {
			Storage::delete($employee->picture);
		}
    $employee->delete($employee->id);
    return redirect('/employees')->with('success', 'Employee has been deleted successfully!');
  }

	public function search()
	{
		/*
			if(request('keyword')) {
					$employee->where('fullname', 'like', '%' . request('keyword') . '%')
									 ->orWhere('position', 'like' , '%' . request('keyword') . '%')
									 ->orWhere('telp', 'like', '%' . request('keyword') . '%')
									 ->orWhere('email', 'like', '%' . request('keyword') . '%')
									 ->orWhere('address', 'like', '%' . request('keyword') . '%');
			}
		*/
	}
}
