<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;


class UserController extends Controller
{
    //
    private $user;

    public function __construct()
    {
        $this->user = new user();
    }

    public function getF() {
        return $this->user::select('*')
            ->orderBy('id', 'DESC')
            ->first();
    }
    public function getUser($id) {
        return $this->user->find($id);
    }

    public function destroy($id) {
        $this->user= $this->getUser($id);
        $user = $this->user->delete();
        return \Response::json($user);
    }
}
