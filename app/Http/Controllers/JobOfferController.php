<?php

namespace App\Http\Controllers;

use App\Models\JbOffer;
use App\Models\MasterBusinessDomain;
use App\Models\MasterOccupation;
use App\Models\MasterPrefectureRegions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class JobOfferController extends Controller
{
    private $JobOffer;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->JobOffer = app(JbOffer::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function search(Request $req)
    {
        if (
            !empty($req->query('sort_by'))
            &&
            !in_array($req->query('sort_by'), config('constant.JOB_OFFER_SEARCH.SORT_BY'))
        ) {
            return abort(404);
        }
        $jobOffers = $this->JobOffer
            ->search($req->query())
            ->paginate(config('constant.JOB_OFFER_SEARCH.LIMIT_PER_PAGE'));
        $occupations = MasterOccupation::with('occupationDetails')->get();
        $prefecture_regions = MasterPrefectureRegions::with('prefectures')->get();
        $domains = MasterBusinessDomain::get();

        return view(
            'members.job-offer.search',
            compact(
                'jobOffers',
                'occupations',
                'prefecture_regions',
                'domains'
            )
        );
    }
}
