<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('last_name')->after('first_name')->nullable();
            $table->string('job_title')->after('last_name')->nullable();
            $table->string('website')->after('job_title')->nullable();
            $table->string('employees_count')->after('website')->nullable();
            $table->integer('tax_card_number')->after('employees_count')->nullable();
            $table->string('tax_card_image')->after('tax_card_number')->nullable();
            $table->integer('commercial_registration_number')->after('tax_card_image')->nullable();
            $table->string('commercial_registration_image')->after('commercial_registration_number')->nullable();
            $table->string('verification_letter_image')->after('commercial_registration_image')->nullable();
            $table->string('employment_agreement')->after('verification_letter_image')->nullable();
            $table->string('image')->after('employment_agreement')->nullable();
            $table->foreignId('experience_category_id')->nullable()->after('state_id')->constrained('experience_categories')->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
}
