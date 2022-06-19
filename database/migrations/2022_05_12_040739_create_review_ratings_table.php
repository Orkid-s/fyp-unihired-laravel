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
        Schema::create('review_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('lecturer_id');
            $table->unsignedBigInteger('student_id');
            $table->integer('star_rating');
            $table->text('review');           
            $table->timestamps();

            $table->foreign('job_id')
                  ->references('id')
                  ->on('lecturer_post_jobs')
                  ->onDelete('cascade');

            $table->foreign('student_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('lecturer_id')
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
        Schema::dropIfExists('review_ratings');
    }
};
