<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Person extends Authenticatable
{
    use HasFactory;
    protected $table = 'person';

    protected $fillable = ['email', 'password','is_active','company_id'];
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

}
