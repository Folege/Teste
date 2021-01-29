<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use DB;
use Illuminate\Support\Facades\Auth;

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
        $Admin = 0;
        $Editar = 0;
        $Apagar = 0;
        $users = user::all();
        $use = Auth::user();
        $requisicoes = DB::table('users')
                ->join('user_as_roles','users.id','=','user_as_roles.user_id')
                ->join('roles','roles.id','=','user_as_roles.roles_id')
                ->select('role','roles.id','name')
                ->where('user_as_roles.user_id','=',$use['id'])
                ->get();
        foreach ($requisicoes as $role){
            if ($role->role == 'Admin')
                $Admin = 1;
            if ($role->role == 'Edit')
                $Editar = 1;

            if ($role->role == 'Apagar')
                $Apagar = 1;

        }

        return view('home',compact('users','use','Admin','Editar','Apagar'));
    }

}
