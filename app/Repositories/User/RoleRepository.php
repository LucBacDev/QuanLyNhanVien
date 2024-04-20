<?php

namespace App\Repositories\User;
use App\Repositories\BaseRepository;
use App\Models\Role;

class RoleRepository extends BaseRepository
{
    public function getModel()
    {
        return Role::class;
    }
}
