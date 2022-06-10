<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkeyAssessmentQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assessment_question', function (Blueprint $table) {
            $table->unsignedBigInteger('q_id');
            $table->unsignedBigInteger('a_id');
            $table->foreign('q_id')->references('id')->on('question')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('a_id')->references('id')->on('assessment')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question', function (Blueprint $table) {
            //
        });
    }
}
