<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth' , 'role:admin']);
    }

    public function index()
    {
        $allUser = User::all();

        return response()->json(
            [
                'data' => $allUser
            ],200
            );
    }

    public function login()
    {
        
    }
}
