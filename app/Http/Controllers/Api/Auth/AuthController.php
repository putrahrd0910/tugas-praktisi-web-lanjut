<?php

namespace App\Http\Controllers\Api\Auth;
 
use App\Http\Controllers\Controller;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //function register
    public function register(request $request) {

    $validateData = $request->validate([
        'name' => 'required|max:25',
        'email' => 'email|required|unique:users',
        'password' => 'required|confirmed'
    ]);
    //create user
    $user = new user([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
    ]);
     $user->save();
     return response()->json($user,201);
}
//Function login
public function login(Request $request)
{
    $validateData = $request ->validate([
        'email'=> 'email|required',
        'password'=> 'required'
    ]);
    $login_detail = request (['email','password']);

    if (!Auth::attempt($login_detail)) {
        return response()->json(['error' => 'login failed, please check your login detail'], 401);
    }

    $user = $request->user();

    $tokenResult= $user->createToken('AccesToken');
    $token = $tokenResult->token;
    $token->save();

    return response()-> json( [
        'access_token' => 'Bearer'. $tokenResult->accessToken,
        'token_id' => $token->id,
        'user_id' => $user->id,
        'name'=> $user->name,
        'email' => $user->email
    ], 200);
}
}