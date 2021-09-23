<?php

namespace App\Http\Controllers\User;

use App\Http\Response\ApiResponse;
use App\Service\User\UserService;

class UserController
{

    private $service;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    /**
     * @return \App\Http\Response\JsonResponse
     */
    public function list()
    {
        $users = $this->service->show();
        return ApiResponse::success($users,'Usuários listados com sucesso');
    }
}
