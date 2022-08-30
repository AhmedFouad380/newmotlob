<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    public function getFileAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Courses') . '/' . $image;
        }
        return null;

    }

    public function setFileAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Courses');
            $this->attributes['file'] = $imageFields;
        }
    }
}
