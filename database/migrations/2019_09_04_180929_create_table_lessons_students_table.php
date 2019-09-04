<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLessonsStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('is_completed')->default(false);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_student');
    }
}
