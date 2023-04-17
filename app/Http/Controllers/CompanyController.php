<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JbOffer;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * It takes a company and a job offer and returns a view
     *
     * @param Company $company
     * @param JbOffer $jbOffer
     *
     * @return View
     */
    public function jbOffers(Company $company, JbOffer $jbOffer): View
    {
        $userId = Auth::id();
        $company['is_followed'] = $company->isFollowed(['user_id' => $userId, 'company_id' => $company->id]);
        $evaluationIcon = $company->evaluationIcon();

        return view('companies.jb_offer', compact(
            'company',
            'jbOffer',
            'evaluationIcon',
        ));
    }
}
