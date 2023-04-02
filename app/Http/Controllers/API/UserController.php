<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function loginUser(Request $request): Response
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if ($validator->fails()) {

    //         return Response(['message' => $validator->errors()], 401);
    //     }

    //     if (Auth::attempt($request->all())) {

    //         $user = Auth::user();

    //         $success =  $user->createToken('MyApp')->plainTextToken;

    //         return Response(['token' => $success], 200);
    //     }

    //     return Response(['message' => 'email or password wrong'], 401);
    // }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            // return response()->json([
            //     'user' => $user,
            //     'token' => $user->createToken('MyApp')->accessToken,
            // ]);
             $success =  $user->createToken('MyApp')->plainTextToken;

            return Response(['token' => $success], 200);

        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    
    public function logout(): Response
    {
        $user = Auth::user();

        $user->currentAccessToken()->delete();

        return Response(['data' => 'User Logout successfully.'], 200);
    }
}
