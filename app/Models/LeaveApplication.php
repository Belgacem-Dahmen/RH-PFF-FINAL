<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LeaveApplication extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'employee_number',
        'conges_date',
        'products',
        'products',
        'leavelists_id',
        'reason',
        'start_date',
        'end_date',
        'half_day',
        'total_days',
        'unpaid_days',
        'total',
        'reprise_date',
        'status',
        'value_status',
        'status_date',
        'note',
        'user'

    ];
    protected $table = 'leaveapplication';
    protected $date = ['deleted_at'];


    public function leavelists ()

{

return $this->belongsTo(Leavelist::class);

}
}
