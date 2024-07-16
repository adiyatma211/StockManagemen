<?php

namespace App\Http\Controllers\APIControllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthApiController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // If authentication is successful, get the authenticated user
            $user = Auth::user();

            // Generate a new auth token for the user and save it to remember_token
            $token = $user->createToken('authToken')->plainTextToken;
            $user->forceFill([
                'remember_token' => $token,
            ])->save();

            // Prepare the response data
            $success['token'] = $token;
            $success['name'] = $user->name;
            $success['id'] = $user->id; // Add the user ID to the response

            // Return a JSON response with the success message and user details
            return response()->json([
                'success' => true,
                'message' => 'Sukses Login',
                'data' => $success
            ], 200);
        } else {
            // If authentication fails, return a JSON response with an error message
            return response()->json([
                'success' => false,
                'message' => 'Gagal Login',
                'data' => []
            ], 401);
        }
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        
        // Revoke the current user's token
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Sukses Logout'
        ]);
    }
}