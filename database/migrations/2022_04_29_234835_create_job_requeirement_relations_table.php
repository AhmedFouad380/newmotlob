<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobRequeirementRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_requeirement_relations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->nullable()->constrained('jobs')->cascadeOnDelete();
            $table->foreignId('job_requirement_id')->nullable()->constrained('job_other_requirements')->cascadeOnDelete();
            $table->foreignId('job_requirement_answers_id')->nullable()->constrained('job_other_requirement_answers')->cascadeOnDelete();
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
        Schema::dropIfExists('job_requeirement_relations');
    }
}
