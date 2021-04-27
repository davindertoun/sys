<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'description',
        'reject_description',
        'state_id',
        'type_id',
    ];
    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }
}
