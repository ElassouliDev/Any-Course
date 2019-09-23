<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRatioToCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('rating_id')->nullable();
//            $table->foreign('rating_id')->references('id')->on('ratings')->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::disableForeignKeyConstraints();
        Schema::table('comments', function (Blueprint $table) {
//            $table->dropForeign('rating_id');
            $table->dropColumn('rating_id');
        });
//        Schema::enableForeignKeyConstraints();
    }
}
