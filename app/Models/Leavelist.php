<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leavelist extends Model
{
    protected $fillable = [
        'leave_name',
        'description',
        'created_by',
    ];
}
