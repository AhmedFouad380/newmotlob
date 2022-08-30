<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobFeatures extends Model
{
    use HasFactory;

    public function CreatedBy(){
        return   $this->belongsTo(Admin::class ,'created_by');
    }


    public function UpdatedBy(){
        return   $this->belongsTo(Admin::class ,'updated_by');
    }


    public function answers(){
        return $this->hasMany( JobFeaturesAnswer::class ,'job_features_id');
    }
}
