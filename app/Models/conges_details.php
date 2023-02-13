<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conges_details extends Model
{
    protected $fillable = [
        'id_LeaveApplication',
        'employee_number',
        'products',
        'leavelists',
        'status',
        'value_status',
        'note',
        'user',
        'conges_date',
        'status_date'
    ];
}
