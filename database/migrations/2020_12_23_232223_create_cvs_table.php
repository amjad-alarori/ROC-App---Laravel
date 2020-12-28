<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string( 'birthDate')->nullable();
            $table->string('address')->nullable();
            $table->string( 'city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_nr')->nullable();

            $table->string('education_mbo')->nullable();
            $table->string('institute_mbo')->nullable();
            $table->string('startDate_mbo')->nullable();
            $table->string('endDate_mbo')->nullable();

            $table->string('level')->nullable();
            $table->string('institute_middle')->nullable();
            $table->string('startDate_middle')->nullable();
            $table->string('endDate_middle')->nullable();

            $table->string( 'institute_basic')->nullable();
            $table->string('startDate_basic')->nullable();
            $table->string('endDate_basic')->nullable();

            $table->string('company')->nullable();
            $table->string('function')->nullable();
            $table->string('startDate_work')->nullable();
            $table->string('endDate_work')->nullable();

            $table->string('hobbyOne')->nullable();
            $table->string('hobbyTwo')->nullable();
            $table->string('hobbyThree')->nullable();
            $table->string('hobbyFour')->nullable();

            $table->string('skillOne')->nullable();
            $table->string('skillTwo')->nullable();
            $table->string('skillThree')->nullable();
            $table->string('skillFour')->nullable();
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
        Schema::dropIfExists('cvs');
    }
}
