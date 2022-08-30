<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function User(){
        return   $this->belongsTo(User::class ,'user_id');
    }


    public function Package(){
        return   $this->belongsTo(Package::class ,'package_id');
    }
}
