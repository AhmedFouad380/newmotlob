<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function CreatedBy(){
        return   $this->belongsTo(Admin::class ,'created_by');
    }


    public function UpdatedBy(){
        return   $this->belongsTo(Admin::class ,'updated_by');
    }

    public function answer(){
        return $this->hasMany( Answer::class ,'question_id');
    }
}
