<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRequest extends Model
{
    use HasFactory;


    public function User(){
        return   $this->belongsTo(User::class ,'user_id');
    }
    public function Job(){
        return   $this->belongsTo(Job::class ,'job_id');
    }

    public function City()
    {
        return $this->belongsTo(City::class, 'city_id')->withDefault([
            'name' => '',
        ]);
    }

    public function Country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withDefault([
            'name' => '',
        ]);
    }


    public function getCvAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/CvJobSeaker') . '/' . $image;
        }
        return null;

    }
    public function setCvAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'CvJobSeaker');
            $this->attributes['cv'] = $imageFields;
        }
    }

    public function getContractAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/contract') . '/' . $image;
        }
        return null;

    }
    public function setContractAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'contract');
            $this->attributes['contract'] = $imageFields;
        }
    }

}
