<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = "detail";

    protected $fillable = [
        'notul_id',
        'task',
        'pic',
        'deadline',
        'status', 
    ];
}
