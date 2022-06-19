<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->string('full_name');
            $table->string('profile_picture')->nullable();
            $table->integer('profile_status')->nullable();
            $table->longText('description');
            $table->string('gender');
            $table->date('DOB');
            $table->integer('age');
            $table->integer('phone');
            $table->text('town');
            $table->text('city');
            $table->integer('ZIP');
            $table->string('state');
            $table->string('country');
            $table->text('course_name');
            $table->integer('year_studies');
            $table->integer('semester');
            $table->string('year_semester');
            $table->text('college');
            $table->text('website');
            $table->text('linkedin');
            $table->text('github');

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
        Schema::dropIfExists('student_profiles');
    }
};
