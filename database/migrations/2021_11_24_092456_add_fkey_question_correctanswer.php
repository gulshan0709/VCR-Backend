<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkeyQuestionCorrectanswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('correctanswer', function (Blueprint $table) {
            $table->unsignedBigInteger('q_id');
            $table->unsignedBigInteger('s_id');
            $table->foreign('q_id')->references('id')->on('question')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('s_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('correctanswer', function (Blueprint $table) {
            //
        });
    }
}
