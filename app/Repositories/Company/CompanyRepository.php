<?php

namespace App\Repositories\Company;
use App\Repositories\BaseRepository;
use App\Models\Company;

class CompanyRepository extends BaseRepository
{
    public function getModel()
    {
        return Company::class;
    }
}
