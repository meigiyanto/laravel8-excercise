<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UsersController extends Controller
{
    public function index()
    {
        return Inertia::render('Users/Index', [
            'can' => [
                'create_user' => Auth::user()->can('users.create'),
            ],
            'users' => User::all()->map(function ($user) {
                return [
                    'first_name' => $user->first_name,
                    'last_name'  => $user->last_name,
                    'email' 	 => $user->email,
                    'can' 		 => ['edit_user' => Auth::user()->can('users.edit', $user)],
                ];
            }),
        ]);
    }
}
