<?php

namespace App\Repositories\User;
use App\Repositories\BaseRepository;
use App\Models\Person;
use App\Models\Company;

class PersonRepository extends BaseRepository
{
    public function getModel()
    {
        return Person::class;
    }
    public function getCompany()
    {
        return Company::all();
    }
}
