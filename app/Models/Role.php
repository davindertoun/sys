<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'role_id',
        
       
    ];

    public function role()
    {

        return $this->belongsTo(role::class);
    }
}
