<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;
class Company extends Model
{
    use HasFactory;
    protected $table = 'company';

    protected $fillable = ['name', 'code','address'];
   
}
