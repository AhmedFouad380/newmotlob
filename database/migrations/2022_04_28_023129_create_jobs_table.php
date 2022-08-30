<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('employees_count')->default(1);
            $table->enum('job_time',['morning','evening','both'])->default('morning');
            $table->enum('is_active',['active','inactive'])->default('inactive');
            $table->longText('description')->nullable();
            $table->integer('min_experience')->nullable();
            $table->integer('max_experience')->nullable();
            $table->integer('min_age')->nullable();
            $table->integer('max_age')->nullable();
            $table->integer('min_salary')->nullable();
            $table->integer('max_salary')->nullable();
            $table->foreignId('currency_id')->nullable()->constrained('job_currencies')->nullOnDelete();
            $table->integer('extra_min_salary')->nullable();
            $table->integer('extra_max_salary')->nullable();
            $table->enum('is_active_salary',['active','inactive'])->default('active');
            $table->integer('is_car_licenses')->default(0);
            $table->string('type_car_licenses')->nullable();
            $table->foreignId('job_type_id')->nullable()->constrained('job_types')->nullOnDelete();
            $table->foreignId('job_qualification_id')->nullable()->constrained('job_qualifications')->nullOnDelete();
            $table->foreignId('job_level_id')->nullable()->constrained('job_levels')->nullOnDelete();
            $table->foreignId('experience_category_id')->nullable()->constrained('experience_categories')->nullOnDelete();
            $table->foreignId('country_id')->nullable()->constrained('countries')->nullOnDelete();
            $table->foreignId('city_id')->nullable()->constrained('cities')->nullOnDelete();
            $table->foreignId('state_id')->nullable()->constrained('states')->nullOnDelete();
            $table->foreignId('village_id')->nullable()->constrained('villages')->nullOnDelete();
            $table->foreignId('company_id')->nullable()->constrained('companies')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
