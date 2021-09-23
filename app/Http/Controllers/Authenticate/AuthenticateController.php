<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Requests\Authenticate\LoginRequest;
use App\Http\Requests\Authenticate\RegisterRequest;
use App\Http\Response\ApiResponse;
use App\Service\User\UserService;
use Illuminate\Http\Request;

class AuthenticateController
{

    protected $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param LoginRequest $request
     * @return \App\Http\Response\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $user = $this->userService->login($request->all());
        if(!$user)
            return ApiResponse::error('','Credenciais inválidas');

        $user['token'] = $user->createToken('tokens')->plainTextToken;
        return ApiResponse::success($user,'Usuário logado com sucesso');
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->userService->create($request->all());
        $user['token'] = $user->createToken('tokens')->plainTextToken;
        return ApiResponse::success($user,'Usuário criado com sucesso');
    }

}
