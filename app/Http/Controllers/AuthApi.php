<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class AuthApi extends Controller
{
    public function response($user)
	{
		$token=$user->createToken( str()->random(40)->plainTextToken);
		return response()->json([
		'user'=>$user,
		'token'=>$token,
		'token_type'=>'Bearer'
	]);

	}

public function register(Request $request)
{
	$request->validate([
		'name'=>'required|min:3',
		'email'=>'required|mail|unique:users',
		'password'=>'required|min:4|confirmed'
	]);
	$user =User::create([
	'name'=>ucwords($request->name),
	'email'=>$request->email,
	'password'=>bcrypt($request->password),
	]);
	return $this->response($user);
}

public function login(Request $request)
{
	$cred =$request->validate([
	'email'=>'required|email|exist::users',
	'password'=>'required|min:4',
	]);

	if (Auth::attempt($cred ) ) {
	return response()->json([
	'massage'=>'Unauthorized.'
	], 401);

	return $this->response( Auth::user() );
}

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
        'message'=>'you have successfull logged out'
        ]);
    }

}
