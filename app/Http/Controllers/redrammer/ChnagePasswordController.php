<?php

namespace App\Http\Controllers\redrammer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;

use Illuminate\Support\Facades\Hash;

use App\User;

class ChnagePasswordController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }
    public function index()

    {
        

         return view('redrammer.password.change');

    }

    
    public function store(Request $request)

    {

        $request->validate([

            'current_password' => ['required', new MatchOldPassword],

            'new_password' => ['required'],

            'new_confirm_password' => ['same:new_password'],

        ]);

   

        User::find(auth()->id())->update(['password'=>$request->new_password]);

   

        return redirect()->route('setting');

    }
}
