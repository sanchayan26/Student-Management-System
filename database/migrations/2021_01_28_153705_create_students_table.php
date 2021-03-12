<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {

            $table->increments('id');
            $table->string('RegistrationNumber')->unique();
            $table->string('IndexNumber')->unique();
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('MiddleName')->nullable(true);
            $table->string('Address');
            $table->integer('DeptNO');
            $table->string('NIC_Number')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('DeptNO')->references('DeptNO')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
