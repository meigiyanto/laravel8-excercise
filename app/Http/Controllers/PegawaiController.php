<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

use App\Models\Pegawai;

class PegawaiController extends Controller
{
	public function index()
	{
		$pegawai = Pegawai::paginate($perPage = 10, $olumns = ['*'], $pageNum = 'pegawai');
		return view('pegawai/index',['pegawai' => $pegawai]);
	}

	public function search(Request $request)
	{
		$temukan = $request->search;
		$pegawai = Pegawai::where('nama','like','%'.$temukan.'%')->paginate();

		return view('pegawai/index',['pegawai' => $pegawai]);
	}

	public function create()
	{
		return view('pegawai/create');
	}

	public function store(Request $request)
	{
		$this->validate($request,[
			'nama' 	  => 'required',
			'jabatan' => 'required',
			'umur' 	  => 'required',
			'alamat'  => 'required'
		]);

		Pegawai::create([
			'nama' 		=> $request->nama,
			'jabatan' => $request->jabatan,
			'umur' 		=> $request->umur,
			'alamat' 	=> $request->alamat
		]);
		return redirect('/pegawai');
	}

	public function edit($id)
	{
		$pegawai = Pegawai::where('id',$id)->get();
		return view('pegawai/edit',['pegawai' => $pegawai]);

	}

	public function update($id, Request $request)
	{
		$this->validate($request,[
			'nama' 	  => 'required',
			'jabatan' => 'required',
			'umur' 	  => 'required',
			'alamat'  => 'required'
		]);

		$pegawai = Pegawai::find($id);
		$pegawai->nama 		= $request->nama;
		$pegawai->jabatan = $request->jabatan;
		$pegawai->umur 		= $request->umur;
		$pegawai->alamat 	= $request->alamat;
		$pegawai->save();

		return redirect('/pegawai');
	}

	public function destroy($id)
	{
		$pegawai = Pegawai::where('id',$id);
		$pegawai->delete();

		return redirect('/pegawai');
	}
}