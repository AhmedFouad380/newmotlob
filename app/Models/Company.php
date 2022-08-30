<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'company_type',
    ];


    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Company') . '/' . $image;
        }
        return null;

    }
    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Company');
            $this->attributes['image'] = $imageFields;
        }
    }
    public function setTaxCardImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'tax_card_image');
            $this->attributes['tax_card_image'] = $imageFields;
        }
    }

    public function getTaxCardImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/tax_card_image') . '/' . $image;
        }
        return null;

    }

    public function setCommercialRegistrationImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'commercial_registration_image');
            $this->attributes['commercial_registration_image'] = $imageFields;
        }
    }

    public function getCommercialRegistrationImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/commercial_registration_image') . '/' . $image;
        }
        return null;

    }

    public function setVerificationLetterImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'verification_letter_image');
            $this->attributes['verification_letter_image'] = $imageFields;
        }
    }

    public function getVerificationLetterImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/verification_letter_image') . '/' . $image;
        }
        return null;

    }

    public function setEmploymentAgreementAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'employment_agreement');
            $this->attributes['employment_agreement'] = $imageFields;
        }
    }

    public function getEmploymentAgreementAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/employment_agreement') . '/' . $image;
        }
        return null;

    }
    public function setEmploymentAgreementUserAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'employment_agreement_user');
            $this->attributes['employment_agreement_user'] = $imageFields;
        }
    }

    public function getEmploymentAgreementUserAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/employment_agreement_user') . '/' . $image;
        }
        return null;

    }
    public function ExperienceCategory(){
        return $this->belongsTo(ExperienceCategory::class ,'experience_category_id');
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

    public function State()
    {
        return $this->belongsTo(State::class, 'state_id')->withDefault([
            'name' => '',
        ]);
    }
    public function Village()
    {
        return $this->belongsTo(Village::class, 'village_id')->withDefault([
            'name' => '',
        ]);

    }

}
