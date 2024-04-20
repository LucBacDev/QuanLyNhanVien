<?php

namespace App\Repositories\User;
use App\Repositories\BaseRepository;
use App\Models\Country;

class CountryRepository extends BaseRepository
{
    public function getModel()
    {
        return Country::class;
    }
}
