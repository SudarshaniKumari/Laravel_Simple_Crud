<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['emp_no', 'emp_fname', 'emp_lname','job_name', 'hiredate', 'email', 'phonenumber', 'dep_no'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'dep_no', 'dep_no');
    }
}
