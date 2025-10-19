<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable=[
        'name',
        'email',
        'phoneNumber',
        'password',
        'schoolId'
    ];
    public function school()
    {
        return $this->belongsTo(school::class,'schoolId','id');
    }
}
