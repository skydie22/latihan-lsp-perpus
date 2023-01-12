<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $allUser = User::all();

        return response()->json(
            [
                'data' => $allUser
            ],200
            );
    }

    public function login(Request $request)
    {
        //Check User Credential
        $credentials = [
            'username' => $request['username'],
            'password' => $request['password'],
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json(
                [
                    "message" => "Invalid Credential"
                ]

            );

        }

        if (Auth::user()->verif == 'unverified') {
            Auth::logout();
            return redirect()->back();
        }
        
        return response()->json(
            [
                "data" => Auth::user(),
                "token" => auth()->user()->createToken('secret')->plainTextToken
            ]
        );
    }
}
