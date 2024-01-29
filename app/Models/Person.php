<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number', 'city'];
}
