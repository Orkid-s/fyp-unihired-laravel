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
        Schema::create('lecturer_post_job_user', function (Blueprint $table) {
            $table->id();
            $table->integer('lecturer_post_job_id');  /* laravel trying to find id with related name from lecturer_post_job table*/
            $table->integer('user_id');   
            $table->string('status');         
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
        Schema::dropIfExists('lecturer_post_job_user');
    }
};
