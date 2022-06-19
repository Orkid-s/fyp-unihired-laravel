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
        Schema::create('lecturer_post_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('job_title');
            $table->text('job_brief');
            $table->text('job_responsibilities');
            $table->string('skills_name');
            $table->integer('job_status')->default(2);
            $table->integer('num_of_recruitment');
            $table->decimal('allowance', 5, 2)->default(00000.00);
            $table->integer('job_duration');
            $table->string('job_duration_type');
            $table->date('start_date');
            $table->date('end_date');
            
            $table->string('work_location');
            /* $table->string('job_location_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('ZIP')->nullable();
            $table->string('country')->nullable(); */
            $table->string('language_name');
            $table->string('language_level');
            $table->string('title_research_project');
            $table->text('research_project_brief');
            $table->string('college_dept');
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
        Schema::dropIfExists('lecturer_post_jobs');
    }
};
