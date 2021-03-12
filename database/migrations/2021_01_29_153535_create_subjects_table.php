<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->string('SubjectCode')->unique();
            $table->string('SubjectName');
            $table->integer('NumberOfCredits');
            $table->string('Category');
            $table->integer('SemesterNumber');
            $table->boolean('ContributionOfGPA');
            $table->integer('DeptNO');
            $table->foreign('DeptNO')->references('DeptNO')->on('departments');
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
        Schema::dropIfExists('subjects');
    }
}
