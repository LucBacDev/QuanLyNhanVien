<?php

namespace App\Repositories\User;
use App\Repositories\BaseRepository;
use App\Models\User;
use App\Models\Role;
class UserRepository extends BaseRepository
{
    public function getModel()
    {
        return User::class;
    }
    public function getRole()
    {
        return Role::all();
    }
}
