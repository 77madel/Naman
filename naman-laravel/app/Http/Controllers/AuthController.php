<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'prenom' => 'required|string|max:50',
            'nom' => 'required|string|max:50',
            'age' => 'required|integer',
            'contact' => 'required|string|max:8',
            'email' => 'required|string|email|max:50|unique:users',
            'username' => 'required|string|max:50|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles_id' => 'required|integer',
            'adresses_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'age' => $request->age,
            'contact' => $request->contact,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'roles_id' => $request->roles_id,
            'adresses_id' => $request->adresses_id,
        ]);

        $token = $user->createToken('LaravelPassport')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('LaravelPassport')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
