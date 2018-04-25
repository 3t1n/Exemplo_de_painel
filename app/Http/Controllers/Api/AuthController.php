<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Config;


class AuthController extends Controller
{
    /**
     * @var JWTAuth
     */

    private $jwtAuth;

    public $jwtconf = eval("Config::set('jwt.user', 'App\Vendedores');");
    public $authconf = eval("Config::set('auth.providers.users.model', \App\Vendedores::class);");

    public function __construct(JWTAuth $jwtAuth)
    {
        $this->jwtconf;
        $this->authconf;

        $this->jwtAuth = $jwtAuth;
    }

    public function login(Request $request)
    {
        $this->jwtconf;
        $this->authconf;
        $credentials = $request->only('email', 'password');

            if (! $token = $this->jwtAuth->attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        $user = $this->jwtAuth->authenticate($token);
        return response()->json(compact('token','user'));
    }
    public function refresh(){
        $this->jwtconf;
        $this->authconf;
        $token = $this->jwtAuth->getToken();
        $token = $this->jwtAuth->refresh($token); /*resultado do refresh*/

        return response()->json(compact('token'));
    }
    public function logout(){
        $this->jwtconf;
        $this->authconf;
        $token = $this->jwtAuth->getToken();
        $this->jwtAuth->invalidate($token); //invalidando o token

        return response()->json(['logout']);
    }
    public function me()
    {
        $this->jwtconf;
        $this->authconf;

            if (! $user = $this->jwtAuth->parseToken()->authenticate()) {
                return response()->json(['error' => 'user_not_found'], 404);
            }

        return response()->json(compact('user'));
    }

}
