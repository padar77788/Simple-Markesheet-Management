<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name',200);
            $table->string('roll',30);
            $table->string('registration',30);
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('semester_id');
            $table->unsignedInteger('shift_id');
            $table->string('f_name',100);
            $table->string('m_name',100);
            $table->string('dob',100);
            $table->string('religion',100);
            $table->string('gender',20);
            $table->string('session');
            $table->foreign('department_id')
                  ->references('id')
                  ->on('departments')
                  ->onDelete('cascade');
            $table->foreign('semester_id')
                  ->references('id')
                  ->on('semesters')
                  ->onDelete('cascade');

            $table->foreign('shift_id')
                  ->references('id')
                  ->on('shifts')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('students');
    }
}
