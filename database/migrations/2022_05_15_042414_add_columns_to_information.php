<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('information', function (Blueprint $table) {
            $table->enum('type',['male','female'])->default('male');
            $table->integer('current_salary')->default(0);
            $table->integer('expected_salary')->default(0);
            $table->enum('military',['ended','without','not_yet'])->default('not_yet');
            $table->integer('is_car_licenses')->default('0');
            $table->string('type_car_licenses')->nullable();
            $table->string('religion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('information', function (Blueprint $table) {
            //
        });
    }
}
