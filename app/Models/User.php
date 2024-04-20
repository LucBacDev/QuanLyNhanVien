<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'user';

    protected $fillable = ['full_name', 'gender','birthdate','phone_number','address'];
    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_user');
    }
}
