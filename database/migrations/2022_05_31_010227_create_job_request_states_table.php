<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobRequestStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_request_states', function (Blueprint $table) {
            $table->id();
            $table->longText('description')->nullable();
            $table->enum('type',['pending','accepted','rejected','new','absentee','other_meeting'
                ,'apology','block','repeat','trial_period']);
            $table->string('reason')->nullable();
            $table->dateTime('interview_date')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('company_id')->nullable()->constrained('companies')->cascadeOnDelete();
            $table->foreignId('job_request_id')->constrained('job_requests')->cascadeOnDelete();
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
        Schema::dropIfExists('job_request_states');
    }
}
