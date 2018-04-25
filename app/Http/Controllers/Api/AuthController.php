<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Config;


class AuthController extends Controller
{
    /**
     * @var JWTAuth
     */

    private $jwtAuth;


    public function __construct(JWTAuth $jwtAuth)
    {
        $this->jwtAuth = $jwtAuth;
    }

    public function login(Request $request)
    {
        Config::set('jwt.user', 'App\Vendedores');
        Config::set('auth.providers.users.model', \App\Vendedores::class);

        $credentials = $request->only('email', 'password');

            if (! $token = $this->jwtAuth->attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        $user = $this->jwtAuth->authenticate($token);
        return response()->json(compact('token','user'));
    }
    public function refresh(){

        $token = $this->jwtAuth->getToken();
        $token = $this->jwtAuth->refresh($token); /*resultado do refresh*/

        return response()->json(compact('token'));
    }
    public function logout(){

        $token = $this->jwtAuth->getToken();
        $this->jwtAuth->invalidate($token); //invalidando o token

        return response()->json(['logout']);
    }
    public function me()
    {

            if (! $user = $this->jwtAuth->parseToken()->authenticate()) {
                return response()->json(['error' => 'user_not_found'], 404);
            }

        return response()->json(compact('user'));
    }

}
