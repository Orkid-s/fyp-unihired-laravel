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
        Schema::create('lecturer_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->string('full_name');
            $table->string('profile_picture')->nullable()->default('/assets/img_avatar.png');
            $table->integer('profile_status')->nullable();
            $table->longText('description');
            $table->string('gender');
            $table->date('DOB');
            $table->integer('age');
            $table->integer('phone');
            $table->text('position');
            $table->string('college_dept');
            $table->string('room_no');
            $table->integer('office_contact');
            $table->integer('ext');
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturer_profiles');
    }
};
