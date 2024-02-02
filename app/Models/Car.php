<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

     protected $fillable = ['brand', 'model', 'year', 'color', 'employee_id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
