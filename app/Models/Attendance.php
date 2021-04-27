<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'time_in',
        'time_out',
        'working_hours',
        'attendance_status',
        'created_at',
        'updated_at',
        'state_id',
        'type_id',
    ];
    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }
}
