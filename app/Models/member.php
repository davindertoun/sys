<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;
    public $fillable=[
        'name',
        'role_id',
        'email',
        'dob',
        'pwd',
        'department',
        'pro_img',
        'skill',
        'url',
        'location',
    ];
}
