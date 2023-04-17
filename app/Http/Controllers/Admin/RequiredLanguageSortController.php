<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateRequiredLanguageSortRequest;
use App\Http\Enum\ResponseCode;
use App\Http\Enum\ResponseStatus;
use App\Models\PickupJob;
use Illuminate\Support\Facades\DB;

class RequiredLanguageSortController extends Controller
{
    /**
     * Display the pickup jobs list page
     *
     * @param \App\Http\Requests\Admin\UpdateRequiredLanguageSortRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequiredLanguageSortRequest $request)
    {
        $this->authorize('update', PickupJob::class);

        $language = $request->language;
        $pickupJobIds = $request->sorted_ids;

        // Begin transaction
        DB::beginTransaction();
        try {
            $pickupJobs = PickupJob::whereIn('id', $pickupJobIds)
                ->where('language', $language)
                ->whereNull('deleted_at')
                ->get();

            if (empty($pickupJobs->toArray())) {
                return response()->json([], 404);
            }
            foreach ($pickupJobs as $pickupJob) {
                foreach ($pickupJobIds as $key => $value) {
                    if ($value == $pickupJob->id) {
                        $pickupJob->update(['sort_order' => ($key + 1)]);
                    }
                }
            }

            // Commit entire changes
            DB::commit();

            return response()->json([], 204);
        } catch (\Exception $exception) {
            DB::rollback();

            return response()->json([], 500);
        }
    }
}
