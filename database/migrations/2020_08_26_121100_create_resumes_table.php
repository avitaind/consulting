<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned()->default('null');
            $table->string('location');
            $table->string('qualification');
            $table->string('gender');
            $table->string('dob');
            $table->string('exprience');
            $table->string('contact');
            $table->string('bio');
            $table->string('resume');
            $table->timestamps();

       
            //$table->foreign('user_id')->constrained('users');
            $table->foreign('user_id')->references('id')->on('users');

 
           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumes');
    }
}
