<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class NotificationController extends Controller
{
    public function index()
    {
	    return view('notifikasi/index');
    }
    
    public function sukses()
    {
	    Session::flash('sukses','Ini notifikasi SUKSES');
	    return redirect('notifikasi');
    }
    
    public function peringatan()
    {
	    Session::flash('peringatan','Ini notifikasi PERINGATAN');
	    return redirect('notifikasi');
    }
    
    public function gagal()
    {
	    Session::flash('gagal','Ini notifikasi GAGAL');
	    return redirect('notifikasi');
    }
}