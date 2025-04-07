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
        $credentials = User::where('email', $request->email)->first();

        try {
            if(!$credentials || !Hash::check($request->password, $credentials->password)) {
                throw new Exception('Invalid credentials');
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 401);
        }
         // Automatically assign roles: admin = 0, regular user = 1
        if ($credentials) {
            $credentials->role = $credentials->role ? 0 : 1; 
            $credentials->save();
        }
        
        if($credentials && Hash::check($request->password, $credentials->password)) {
            $token = $credentials->createToken('personal-token')->plainTextToken;
            return response()->json([
                'token' => $token,
                'data' => $credentials
            ]);
        }
    }

}
