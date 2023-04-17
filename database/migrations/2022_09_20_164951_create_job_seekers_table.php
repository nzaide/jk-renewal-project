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
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname')->nullable();
            $table->string('mail_address');
            $table->string('password');
            $table->string('english_name')->nullable();
            $table->tinyInteger('english_fluency')->nullable();
            $table->unsignedInteger('language_first_id')->nullable();
            $table->tinyInteger('language_first_fluency')->nullable();
            $table->unsignedInteger('language_second_id')->nullable();
            $table->tinyInteger('language_second_fluency')->nullable();
            $table->string('language_second_speaking')->nullable();
            $table->string('language_second_reading')->nullable();
            $table->string('language_second_writing')->nullable();
            $table->unsignedInteger('language_third_id')->nullable();
            $table->tinyInteger('language_third_fluency')->nullable();
            $table->string('language_third_speaking')->nullable();
            $table->string('language_third_reading')->nullable();
            $table->string('language_third_writing')->nullable();
            $table->boolean('is_blacklist');
            $table->smallInteger('gender')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('landline')->nullable();
            $table->dateTime('birth_date')->nullable();
            $table->unsignedInteger('nationality_id')->nullable();
            $table->tinyInteger('visa_id')->nullable();
            $table->tinyInteger('marital_status')->nullable();
            $table->text('profile');
            $table->string('social_media')->nullable();
            $table->text('other_contact')->nullable();
            $table->tinyInteger('highest_degree')->nullable();
            $table->tinyInteger('education_level')->nullable();
            $table->tinyInteger('university_major')->nullable();
            $table->smallInteger('employment_status')->nullable();
            $table->string('present_employer')->nullable();
            $table->string('start_availability')->nullable();
            $table->string('interview_availability')->nullable();
            $table->string('current_salary')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('preferred_shift')->nullable();
            $table->string('resignation_reason')->nullable();
            $table->smallInteger('preferred_employment')->nullable();
            $table->string('pending_application')->nullable();
            $table->string('applicant_resume')->nullable();
            $table->string('complete_blind_resume')->nullable();
            $table->string('blind_resume')->nullable();
            $table->string('original_resume')->nullable();
            $table->string('shokumu_keirekisho')->nullable();
            $table->string('rirekisho')->nullable();
            $table->text('request')->nullable();
            $table->string('job_posting')->nullable();
            $table->string('interviewer')->nullable();
            $table->dateTime('reactivation_date')->nullable();
            $table->tinyInteger('status');
            $table->dateTime('interview_date')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('job_seekers');
    }
};
