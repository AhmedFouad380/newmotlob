<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;



    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Pages') . '/' . $image;
        }
        return null;

    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Pages');
            $this->attributes['image'] = $imageFields;
        }
    }
    public function CreatedBy(){
        return   $this->belongsTo(Admin::class ,'created_by');
    }


    public function UpdatedBy(){
        return   $this->belongsTo(Admin::class ,'updated_by');
    }
}
