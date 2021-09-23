<?php

namespace App\Service\User;

use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{

    protected $user;
    protected $repository;

    /**
     * @param User $user
     * @param UserRepository $userRepository
     */
    public function __construct(User $user , UserRepository $userRepository)
    {
        $this->repository = $userRepository;
        $this->user = $user;
    }

    /**
     * @param array $data
     * @return false
     */
    public function login(array $data)
    {
        $user = $this->user->where('email','=',$data['email'])->first();

        if(!$user || !Hash::check($data['password'] , $user->password)){
            return false;
        }

        return $user;

    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->user->create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }

    /**
     * @return mixed
     */
    public function show()
    {
        return $this->user->get();
    }

}
