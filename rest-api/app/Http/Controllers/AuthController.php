<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    //membuat register
    public function register(Request $request)
    {
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $user = User::create($input);

        $data = [
            'message' => 'User is created succesfully'
        ];

        return response()->json($data, 200);
    }


    //ini membuat login
    public function login(Request $request) {
        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $user = User::where('email', $input['email'])->first();

        $isloginSuccesfully = (
            $input['email'] == $user -> email
            &&
            Hash::check($input['password'], $user->password,)
        );

        if ($isloginSuccesfully) {
            $token = $user->createToken('auth_token');

            $data = [
                'mesaage' => 'Login Succesfully',
                'token' => $token->plainTextToken
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Username or password is wrong'
            ];

            return response()->json($data, 401);
        }
    }

}
