<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

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
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id')->withDefault([
            'name' => '',
        ]);
    }
    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id')->withDefault([
            'name' => '',
        ]);
    }
    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id')->withDefault([
            'company_name' => '',
        ]);
    }


    public function Currency()
    {
        return $this->belongsTo(JobCurrency::class, 'currency_id')->withDefault([
            'company_name' => '',
        ]);
    }

    public function ExperienceCategory()
    {
        return $this->belongsTo(ExperienceCategory::class, 'experience_category_id')->withDefault([
            'name' => '',
        ]);
    }
    public function ExperienceSpecialization()
    {
        return $this->belongsTo(ExperienceSpecialization::class, 'specialization_id')->withDefault([
            'name' => '',
        ]);
    }

    public function jobfeatures(){
        return $this->HasMany(JobFeaturesRelation::class,'job_id');
    }

    public function jobfeaturesAnswers(){
        return $this->belongsToMany(JobFeaturesAnswer::class,'job_features_relations','job_id','job_features_answers_id');
    }
    public function job_other_requirements(){
        return $this->HasMany(JobRequeirementRelation::class,'job_id');
    }



    public function JobQualification()
    {
        return $this->belongsTo(JobQualification::class, 'job_qualification_id')->withDefault([
            'name' => '',
        ]);
    }
    public function JobType()
    {
        return $this->belongsTo(JobType::class, 'job_type_id')->withDefault([
            'name' => '',
        ]);
    }

    public function JobLevel()
    {
        return $this->belongsTo(JobLevel::class, 'job_level_id')->withDefault([
            'name' => '',
        ]);
    }


}
