<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Employees extends Model
{
    use HasFactory , SoftDeletes , HasRoles;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'Gender',
        'status',
        'job_title',
        'hire_date',
        'date_of_birth',
        'salary',
    ];

    protected $table = 'employees';

    // public function getDateOfBirthAttribute($value) {
    //     return date( 'm/D h:i' ,strtotime($value));
    // }

    // public function getHireDateAttribute($value) {
    //     return date( 'm/D h:i' ,strtotime($value));
    // }
}
