<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('department_id');
          $table->integer('semester_id');
          $table->integer('credit');
          $table->string('roll',30);
          $table->integer('subject_id');
          $table->string('marks',10);
          $table->string('grade');
          $table->string('gpa');
          $table->foreign('department_id')
                 ->references('id')
                 ->on('departments')
                 ->onDelete('cascade');
          $table->foreign('semester_id')
                ->references('id')
                ->on('semesters')
                ->onDelete('cascade');
          $table->foreign('subject_id')
                ->references('id')
                ->on('subjects')
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
        Schema::dropIfExists('results');
    }
}
