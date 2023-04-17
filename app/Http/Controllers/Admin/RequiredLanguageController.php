<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PickupJobLanguage;
use App\Http\Requests\Admin\StorePickupJobRequest;
use App\Models\JobPost;
use App\Models\PickupJob;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequiredLanguageController extends Controller
{
    /**
     * Display the pickup jobs list page
     *
     * @return \Illuminate\Http\View
     */
    public function index()
    {
        $this->authorize('viewAny', PickupJob::class);

        // Initiate Query
        $pickupJobs = PickupJob::all()
            ->whereNull('deleted_at')
            ->sortBy('sort_order');

        // Get English Languages
        $englishLanguages = $pickupJobs
            ->where('language', PickupJobLanguage::English->value)
            ->take(10);

        // Get Japanese Languages
        $japaneseLanguages = $pickupJobs
            ->where('language', PickupJobLanguage::Japanese->value)
            ->take(10);

        // Get Korean Languages
        $koreanLanguages = $pickupJobs
            ->where('language', PickupJobLanguage::Korean->value)
            ->take(10);

        // Get Mandarin Languages
        $mandarinLanguages = $pickupJobs
            ->where('language', PickupJobLanguage::Mandarin->value)
            ->take(10);

        return view('admin.pickup-jobs.index', compact([
            'englishLanguages',
            'japaneseLanguages',
            'koreanLanguages',
            'mandarinLanguages',
        ]));
    }

    /**
     * Store group
     *
     * @param \App\Http\Requests\Admin\StorePickupJobRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StorePickupJobRequest $request)
    {
        $this->authorize('create', PickupJob::class);

        $jobPostId = $request->job_post_id;
        $language = $request->language;

        // Begin transaction
        DB::beginTransaction();
        try {
            $lastOrder = PickupJob::orderBy('sort_order', 'desc')
                ->where('language', $language)
                ->whereNull('deleted_at')
                ->first()
                ->sort_order ?? 0;

            $max = config('constant.MAX_PICKUP_JOBS');
            if ($lastOrder === $max) {
                return back()->with([
                    'warning' => __('You can only add 10 Pickup Job Posts.'),
                ]);
            }

            PickupJob::create([
                'job_post_id' => $jobPostId,
                'language' => $language,
                'sort_order' => ($lastOrder + 1),
            ]);

            // Commit entire changes
            DB::commit();

            $textLanguage = PickupJobLanguage::cases()[($language - 1)]->text();

            return back()->with([
                'success' => __('Successfully added'),
                'message' => __('Job ID ' . $jobPostId . ' was added to the ' . $textLanguage . ' Pickup Job Posts'),
            ]);
        } catch (\Exception $exception) {
            DB::rollback();

            return back()->with('error', __('An error has occured.'));
        }
    }

    /**
     * Delete pickup jobs
     *
     * @param \App\Models\PickupJob $requiredLanguage
     * @param \Illuminate\Http\Request $request
     *
     * @return RedirectResponse
     */
    public function destroy(PickupJob $requiredLanguage, Request $request)
    {
        $this->authorize('delete', PickupJob::class);

        // Begin transaction
        DB::beginTransaction();
        try {
            $deleted = $requiredLanguage->delete();

            if ($deleted) {
                // Get existing pickup job
                $existJobs = PickupJob::where('language', $requiredLanguage->language)
                    ->where('id', '!=', $requiredLanguage->id)
                    ->whereNull('deleted_at')
                    ->orderBy('sort_order')
                    ->get();

                // Update Order
                $order = 1;
                foreach ($existJobs as $existJob) {
                    $existJob->update(['sort_order' => $order]);
                    $order++;
                }

                // Commit entire changes
                DB::commit();

                return back()->with('success', __('Successfully deleted'));
            }

            return back()->with('error', __('An error has occurred'));
        } catch (\Exception $exception) {
            DB::rollback();

            return back()->with('error', __('An error has occured.'));
        }
    }
}
