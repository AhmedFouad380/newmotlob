<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Add2RowToCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('facebook')->after('experience_category_id')->nullable();
            $table->string('twitter')->after('facebook')->nullable();
            $table->string('instagram')->after('twitter')->nullable();
            $table->string('youtube')->after('instagram')->nullable();
            $table->enum('active_profile',['active','inactive'])->after('youtube')->default('active');
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
