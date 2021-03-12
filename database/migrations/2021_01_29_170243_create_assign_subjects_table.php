<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignSubjects', function (Blueprint $table) {
            $table->id();
            $table->string('LectID');
            $table->foreign('LectID')->references('LectID')->on('lecturers');
            $table->string('SubjectCode');
            $table->foreign('SubjectCode')->references('SubjectCode')->on('subjects');

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
        Schema::dropIfExists('assignSubjects');
    }
}
