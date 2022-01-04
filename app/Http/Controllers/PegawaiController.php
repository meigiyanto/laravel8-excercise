<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pegawai;

class PegawaiController extends Controller
{
	public function index()
	{
		// $pegawai = DB::table('pegawai')->paginate($perPage = 10, $olumns = ['*'], $pageNum = 'pegawai');
		/* Eloquent */
		$pegawai = Pegawai::paginate($perPage = 10, $olumns = ['*'], $pageNum = 'pegawai');
		return view('pegawai/index',['pegawai' => $pegawai]);
	}

	public function cari(Request $request)
	{
		$cari    = $request->cari;
		// $pegawai = DB::table('pegawai')
		//			->where('pegawai_nama','like',"%".$cari."%")
		//			->paginate();
		
		/* Eloquent */
		$pegawai = Pegawai::where('pegawai_nama','like','%'.$cari.'%')->paginate();

		return view('pegawai/index',['pegawai' => $pegawai]);
	}
	
	public function tambah()
	{
		return view('pegawai/tambah');
	}

	public function store(Request $request)
	{
		/*
		DB::table('pegawai')->insert([
			'pegawai_nama' => $request->nama,
			'pegawai_jabatan' => $request->jabatan,
			'pegawai_umur' => $request->umur,
			'pegawai_alamat' => $request->alamat
		]);
		*/
		
		/* Eloquent */
		$this->validate($request,[
			'nama' 	  => 'required',
			'jabatan' => 'required',
			'umur' 	  => 'required',
			'alamat'  => 'required'
		]);
		
		Pegawai::create([
			'pegawai_nama' 		=> $request->nama,
			'pegawai_jabatan' 	=> $request->jabatan,
			'pegawai_umur' 		=> $request->umur,
			'pegawai_alamat' 	=> $request->alamat
		]);
		return redirect('/pegawai');
	}

	public function edit($id)
	{
		// $pegawai = DB::table('pegawai')->where('pegawai_id',$id)->get();
		$pegawai = Pegawai::where('pegawai_id',$id)->get();
		return view('pegawai/edit',['pegawai' => $pegawai]);

	}

	public function update(Request $request)
	{
		/*
		DB::table('pegawai')->where('pegawai_id',$request->id)->update([
			'pegawai_nama' 		=> $request->nama,
			'pegawai_jabatan' 	=> $request->jabatan,
			'pegawai_umur' 		=> $request->umur,
			'pegawai_alamat' 	=> $request->alamat
		]);
		*/
		
		/* Eloquent */
		$this->validate($request,[
			'nama' 	  => 'required',
			'jabatan' => 'required',
			'umur' 	  => 'required',
			'alamat'  => 'required'
		]);
		
		$pegawai 			= Pegawai::find($id);
		$pegawai->nama 		= $request->nama;
		$pegawai->jabatan 	= $request->jabatan;
		$pegawai->umur 		= $request->umur;
		$pegawai->alamat 	= $request->alamat;
		$pegawai->save();
		return redirect('/pegawai');
	}

	public function hapus($id)
	{
		// DB::table('pegawai')->where('pegawai_id',$id)->delete();
		/* Eloquent */
		$pegawai = Pegawai::where('pegawai_id',$id);
		$pegawai->delete();
		return redirect('/pegawai');
	}
}