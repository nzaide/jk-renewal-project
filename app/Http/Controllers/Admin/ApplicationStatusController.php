<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateApplicationStatusRequest;
use App\Models\Application;

class ApplicationStatusController extends Controller
{
    /**
     * Update Application status
     *
     * @param \App\Models\Application $application
     * @param \App\Http\Requests\Admin\UpdateApplicationStatusRequest $request
     * @return array
     */
    public function update(Application $application, UpdateApplicationStatusRequest $request)
    {
        $application->update($request->only('application_status'));

        return [];
    }
}
