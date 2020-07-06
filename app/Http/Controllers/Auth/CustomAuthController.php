<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return Auth::user();
        } else {
            return response('Invalid Credentials', 401);
        }
    }

    public function logout()
    {
        try {
            //log user out
            Auth::logout();

            return response()->json('', 204);
        } catch (\Exception $e) {
            //return error message
            return response()->json('error_logout', 500);
        }
    }
}
