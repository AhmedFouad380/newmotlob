<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnEmploymentTypeToCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->enum('employment_type',['daily','monthly'])->nullable();
            $table->enum('employment_agreement_type',['postpaid'])->nullable();
            $table->enum('recruitment_fee_postpaid_monthly',['percentage','fixed'])->nullable();
            $table->integer('percentage_postpaid_monthly')->nullable();
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
