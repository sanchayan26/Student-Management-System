<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->string('RegistrationNumber');
            $table->string('SubjectCode');
            $table->integer('ESE');
            $table->integer('CA');
            $table->integer('Lecturer');
            $table->foreign('SubjectCode')->references('SubjectCode')->on('subjects');
            $table->foreign('RegistrationNumber')->references('RegistrationNumber')->on('students');
            $table->rememberToken();
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
        Schema::dropIfExists('marks');
    }
}
