<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;

class AuthController extends Controller
{
	/**
	* Register new user
	*
	* @param [string] name
	* @param [string] email
	* @param [string] password
	* @param [string] password_confirmation
	* @return \Illumintae\Http\JsonResponse
	* @throws \Illuminate\Validation\ValidationException
	*/
    public function signup(Request $request)
    {
	    // validation of requests
    	$validation = $this->validate($request, [
    		'name' => ['required', 'string', 'max:255'],
    		'email' => ['required','string', 'email', 'unique:users'],
    		'password' => ['required', 'min:6', 'confirmed']
    	]);
        
        // store new user
    	DB::beginTransaction();
        try {
            $user = User::create([
	    		'name' => $request->name,
	    		'email' => $request->email,
	    		'password' => Hash::make($request->password)
	    	]);	
	    	DB::commit();

	    	return response()->json($user->toArray(), 201);
        } catch (\Exception $e) {
        	DB::rollback();
	    	return response()->json($e->getMessage(), 401);
        }
    }
    
    /**
    * Attempting login and create access token
    *
    * @param [string] email
    * @param [string] password
    * @param [string] remember_me
    * @return [string] access_token
    * @return [string] token_type
    * @return [string] expires_at
    */
    public function login(Request $request) 
    {
        // validation of request
        $validation = $this->validate($request, [
        	'email' => ['required', 'string', 'email'],
        	'password' => ['required', 'string'],
        	'remember_me' => ['boolean']
        ]);

        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            // generate access token
            $user        = Auth::user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token       = $tokenResult->token;
            if ($request->remember_me) {
            	$token->expires_at = Carbon::now()->addWeeks(1);
            }
            $token->save();

            return response()->json([
            	'access_token' => $tokenResult->accessToken,
            	'token_type' => 'Bearer',
            	'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
            ]);
        } else {
        	return response()->json(['error' => 'Unauthorized'], 401); //Unauthorized. The user needs to be authenticated.
        }
    }

    /**
    * Logout
    *
    */
    public function logout(Request $request)
    {
    	DB::beginTransaction();
    	try {
	    	$request->user()->token()->revoke();
	    	DB::commit();

	    	return response()->json(['message' => 'Successfully logged out.'], 200);
    	} catch (\Exception $e) {
    		DB::rollback();

    		return response()->json(['error' => 'Signout failed.'], 401);
    	}

    }
}
