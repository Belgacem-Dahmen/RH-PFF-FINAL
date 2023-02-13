<?php

namespace App\Models;

use App\Models\Leavelist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class products extends Model
{
    protected $fillable = [
        'product_name',
        'description',
        'leavelists_id',
    ];

public function leavelists ()

{

return $this->belongsTo(Leavelist::class);

}

}
