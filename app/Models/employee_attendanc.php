<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employees;
use Illuminate\Database\Eloquent\SoftDeletes;

class employee_attendanc extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'employee_id',
        'date',
        'start_date',
        'end_date',
        'duration',
        'reason',
    ];

    protected $table = 'employee_attendance';


    public function  employee()
    {
        return $this->belongsTo(Employees::class, 'employee_id' , 'id');
    }

    // get Today Date Attribute
    // public function getDateAttribute($value) {
    //     return date( 'm/D h:i' ,strtotime($value));
    // }
    // get Start Date Attribute
    // public function getStartDateAttribute($value) {
    //     return date( 'm/D h:i' ,strtotime($value));
    // }
// get End Date Attribute
    // public function getEndDateAttribute($value) {
    //     return date( 'm/D h:i' ,strtotime($value));
    // }
// get Duration Date Attribute
    // public function getDurationAttribute($value) {
    //     return date( 'm/D h:i' ,strtotime($value));
    // }
}
