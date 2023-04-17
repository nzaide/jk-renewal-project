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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_number')->nullable();
            $table->smallInteger('status')->nullable();
            $table->string('salary');
            $table->string('job_name_en');
            $table->string('industry_en');
            $table->string('location_en');
            $table->text('benefits_en');
            $table->text('details_en');
            $table->string('job_name_jp')->nullable();
            $table->string('industry_jp')->nullable();
            $table->string('location_jp')->nullable();
            $table->text('benefits_jp')->nullable();
            $table->text('details_jp')->nullable();
            $table->string('job_name_kr')->nullable();
            $table->string('industry_kr')->nullable();
            $table->string('location_kr')->nullable();
            $table->text('benefits_kr')->nullable();
            $table->text('details_kr')->nullable();
            $table->string('job_name_cn')->nullable();
            $table->string('industry_cn')->nullable();
            $table->string('location_cn')->nullable();
            $table->text('benefits_cn')->nullable();
            $table->text('details_cn')->nullable();
            $table->dateTime('post_start_date');
            $table->dateTime('post_end_date')->nullable();
            $table->tinyInteger('display_status');
            $table->smallInteger('target');
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('admin_id')->nullable();
            $table->string('heads_needed')->nullable();
            $table->string('work_arrangement')->nullable();
            $table->string('tracker_url')->nullable();
            $table->string('company_name')->nullable();
            $table->string('position')->nullable();
            $table->string('language_fluency')->nullable();
            $table->string('schedule')->nullable();
            $table->string('visa')->nullable();
            $table->string('education')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('experience')->nullable();
            $table->string('abroad')->nullable();
            $table->string('website')->nullable();
            $table->string('interview_schedule')->nullable();
            $table->string('job_description')->nullable();
            $table->string('job_description_jp')->nullable();
            $table->string('job_post_jp')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
};
