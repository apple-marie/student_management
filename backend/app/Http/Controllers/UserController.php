<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request) 
    {
        try {

            $credentials = User::where('email', $request->email)->first();
            if(!$credentials || !Hash::check($request->password, $credentials->password)) {
                throw new Exception('Invalid credentials');
            }
            if($credentials && Hash::check($request->password, $credentials->password)) {
                $token = $credentials->createToken('personal-token')->plainTextToken;
                return response()->json([
                    'token' => $token,
                    'data' => $credentials,
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 401);
        }
        
    }

}
