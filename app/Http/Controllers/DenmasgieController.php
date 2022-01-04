<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Anggota;
use App\Models\Hadiah;

class DenmasgieController extends Controller
{
    public function index()
    {
	    $anggota = Anggota::get();
	    return view('anggota/index', ['anggota' => $anggota]);
    }

	public function hash() {
		$hash_password_saya = Hash::make('Taureanixion14@');
		echo $hash_password_saya;
	}
}
