<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Member;
use App\Models\Reward;


class MemberController extends Controller
{
    public function index()
    {
    	$member = Member::get();
    	return view('member/index', ['member' => $member]);
    }
}
