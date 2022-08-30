<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultCode extends Model
{
    use HasFactory;

    public function CreatedBy(){
        return   $this->belongsTo(Admin::class ,'created_by');
    }


    public function UpdatedBy(){
        return   $this->belongsTo(Admin::class ,'updated_by');
    }
    public function SkillResult(){
        return   $this->HasMany(SkillsResult::class ,'result_code_id');
    }

}
