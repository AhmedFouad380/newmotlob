<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    public function JobRequest(){
        return   $this->belongsTo(JobRequest::class ,'job_request_id')->withDefault([
        ]);
    }
}
