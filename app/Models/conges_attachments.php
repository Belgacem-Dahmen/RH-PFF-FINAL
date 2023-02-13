<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conges_attachments extends Model
{
    protected $fillable = [
        'file_name',
        'employee_number',
        'LeaveApplication_id',
        'created_by',
        
    ];
}
