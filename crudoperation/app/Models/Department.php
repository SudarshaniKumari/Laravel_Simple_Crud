<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['dep_no', 'dep_name', 'location'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'dep_no', 'dep_no');
    }
}
