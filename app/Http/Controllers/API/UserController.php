<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
                    "msg" => "Invalid Credential"
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


    //get admin
    public function all_admin()
    {
        $datas = User::where('role', 'admin')->get();

        return response()->json(
            [
                "msg" => "Succsess Fetch All Data",
                "data" => $datas
            ]
        );
    }

 //store admin
    public function storeAdmin(Request $request)
    {

        // Validating Data that stored
        $rules = [
            'fullname' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return response()->json(
                [
                    'message' => $errors
                ]
            );
        }


        // Creating Data
        try {
            $admin = User::create([
                'fullname' => $request->fullname,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'role' => "admin",
                'join_date' => Carbon::now(),
                'verif' => 'verified',
                'kode' => 'AA' . $request->id
                // 'terakhir_login' => $request->terakhir_login
            ]);
        } catch (Exception $e) {
            return response()->json(
                [
                    "message" => $e
                ]
            );
        }

        // Response Json
        $created = User::findorFail($admin->id);

        $data = [];

        $data['id'] = $created->id;
        $data['fullname'] = $created->fullname;
        $data['username'] = $created->username;
        $data['terakhir_login'] = $created->terakhir_login;

        return response()->json(
            [
                "message" => "Succsess Create Data",
                "data" => $data
            ]
        );
    }

    //update admin
    public function updateAdmin(Request $request, $id)
    {
        // Validating Data that stored
        $rules = [
            'fullname' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return response()->json(
                [
                    'message' => $errors
                ]
            );
        }


        $admin = tap(User::where('role', 'admin')->where('id', $id))
            ->update([
                'fullname' => $request->fullname,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'role' => "admin",
            ])
            ->first();

        if ($admin != null) {
            return response()->json(
                [
                    "message" => "Succsess Update Data",
                    "data" => $admin
                ]
            );
        }

        return response()->json(
            [
                "message" => "Failed Update Data",
            ]
        );
    }

    //delete admin
    public function destroyAdmin($id)
    {

        $checker =  User::where('role', 'admin')->where('id', $id)->delete();


        if ($checker == 0) {
            return response()->json([
                "message" => "Failed Deleting Data",
            ]);
        }



        return response()->json([
            "message" => "Sucsess Delete Data",
        ]);
    }

}
