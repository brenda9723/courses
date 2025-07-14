<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = User::all();
            if ($users->isEmpty()) {
                return response()->json(['message' => 'No se ha encontrado ningun usuario'], 404);
            }
            return response()->json($users, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        try {
            // 'name',
            // 'email',
            // 'password',
            $data = $request->only(['name', 'email', 'password']);
            $user = User::create($data);

            return response()->json($user, 201);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function login(Request $request)
    {
        try{

            $user = User::where('email', $request->email)->first();
            if (! Hash::check($request->password, $user->password)) {
    
                return response()->json(['error' => 'Credenciales inválidas'], 401);
            }
            $token = $user->createToken('api-token')->plainTextToken;
    
            return response()->json([
                'access_token' => $token,
                'token_type'   => 'Bearer',
            ]);
        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }
}
