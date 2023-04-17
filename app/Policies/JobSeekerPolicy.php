<?php

namespace App\Policies;

use App\Enums\JobSeekerStatus;
use App\Models\JobSeeker;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User;

class JobSeekerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the use can do anything with the model.
     *
     * @param \Illuminate\Foundation\Auth\User $user
     * @return bool
     */
    public function before(User $user)
    {
        if ($user->status == JobSeekerStatus::InitiallyRegistered->value) {
            return $user->status == JobSeekerStatus::InitiallyRegistered->value;
        }

        if (auth()->check('isFullyRegistered')) {
            return $user->id == request()->job_seeker->id;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return bool
     */
    public function view()
    {
        return true;
    }

    /**
     * Determine whether the user can edit the model.
     *
     * @return bool
     */
    public function edit()
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\JobSeeker  $jobSeeker
     * @param  \App\Models\JobSeeker  $jobSeeker
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(JobSeeker $jobSeeker, JobSeeker $model)
    {
        return $jobSeeker->id == $model->id;
    }
}
