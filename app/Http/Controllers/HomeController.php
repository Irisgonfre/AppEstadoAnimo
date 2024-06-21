<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $users = User::whereNotIn('id', [20])->get();
        if($user->name=="Root"){
            return view('admin.principal',[
                'user'=>$user,
                'users'=>$users,
            ]);
        }else{
            return view('home',[
                'user'=>$user
            ]);
        }
    }
}
