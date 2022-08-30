<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_payments', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->enum('states',['active','inactive'])->default('active');
            $table->integer('cv_count_used')->default(0);
            $table->integer('adv_count_used')->default(0);
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->foreignId('package_id')->constrained('company_packages')->restrictOnDelete();
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
        Schema::dropIfExists('company_payments');
    }
}
