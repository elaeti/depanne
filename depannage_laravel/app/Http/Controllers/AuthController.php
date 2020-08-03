<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use App\administrateur;
use App\client;
use App\ouvrier;



class AuthController extends Controller {

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'signup']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    
         public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Email or password does\'t exist'], 401);
        }

        return $this->respondWithToken($token);
    }
         

 
    

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function signup(SignUpRequest $request) {
        

        $role = $request->input('role');
        if ($role=="client") {
            $value = Client::create();
        }else if ($role=="ouvrier") {
             $value = Ouvrier::create();
        } else{
            $value= Administrateur::create();
        }

        /* $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                )); */

        $user = User::create([
            'profillable_id' => $value->id,
            'profillable_type' => $role,
            'name' => $request->get('name'),
            'prenom' => $request->get('prenom'),
            'tel' => $request->get('tel'),
            'role' => $request->get('role'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        

        return $this->login($request);
    }


 public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 600000,
            'user' => auth()->user()->name,
            'role' =>auth()->user()->role
        ]);
    }

    

}