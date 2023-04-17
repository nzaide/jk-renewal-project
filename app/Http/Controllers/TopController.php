<?php

namespace App\Http\Controllers;

use App\Enums\AboutUsUrl;
use App\Enums\ForClientsUrl;
use App\Enums\JobPostDisplayStatus;
use App\Enums\JobPostStatus;
use App\Models\Language;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class TopController extends Controller
{
    private $SearchLocale;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->SearchLocale = [
            'en' => '',
            'ja' => 'lang_ja',
            'zh-cn' => 'lang_zh-CN',
            'ko' => 'lang_ko'
        ];
    }

    /**
     * Top Page view.
     *
     * @return \Illuminate\Contracts\View\View|void
     */
    public function __invoke(Request $request)
    {
        $locales = [
            'en' => '/',
            'ja' => 'forApplicants_ja',
            'zh-cn' => 'forApplicants_zh-CN',
            'ko' => 'forApplicants_ko'
        ];
        $locale = array_search($request->path(), $locales);

        App::setLocale($locale);
        URL::defaults(['locale' => $locale]);

        $searchLocale = $this->SearchLocale[$locale];

        $languages = Language::has('jobPosts')
            ->withCount('jobPosts')
            ->orderBy('job_posts_count', 'DESC')
            ->limit(18)
            ->get();

        $jobSeeker = $request->user();
        $selectedLanguage = $request->query('la');

        $jobPosts = JobPost::query()
            ->ofPickupJobPreference($jobSeeker, $selectedLanguage)
            ->ofJobPostLanguagePreference($jobSeeker, $selectedLanguage)
            ->with('languagePreferences')
            ->where('display_status', JobPostDisplayStatus::Displayed)
            ->where('status', JobPostStatus::Open)
            ->where(function ($query) {
                $query->whereDate('post_start_date', '<=', today())
                    ->whereDate('post_end_date', '>=', today())
                    ->orWhereNull('post_end_date');
            })
            ->orderByDesc('updated_at')
            ->limit(5)
            ->get();

        return view('index_' . $locale, compact([
            'languages',
            'jobPosts',
            'searchLocale'
        ]));
    }

    /**
     * Set Language
     *
     * @param string $language
     * @param int|null $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setLanguage($language, $id = null)
    {
        $previousRouteName = app('router')->getRoutes()
            ->match(request()->create(URL::previous()))
            ->getName();

        // Set locale parameter
        $params = ['locale' => $language];
        $modifyRouteName = substr($previousRouteName, 0, strripos($previousRouteName, '.'));

        if (
            strpos($modifyRouteName, 'top') !== false ||
            strpos($modifyRouteName, 'about-us') !== false ||
            strpos($modifyRouteName, 'pages.show') !== false
        ) {
            $routeName = $modifyRouteName . '.' . $language;

            return redirect()->route($routeName);
        } elseif (strpos($modifyRouteName, 'job-seekers') !== false) {
            $params['job_seeker'] = $id;
        } elseif (strpos($modifyRouteName, 'job-posts') !== false) {
            if ($previousRouteName == 'job-posts.search') {
                $previousUrl = URL::previous();
                $checkUrl = substr($previousUrl, 0, strripos($previousUrl, '&lang_'));
                $urlSeparator = $language !== 'en' ? '&' : '';
                $newUrl = $checkUrl
                    ? $checkUrl . $urlSeparator . $this->SearchLocale[$language]
                    : $previousUrl . $urlSeparator . $this->SearchLocale[$language];

                return redirect($newUrl);
            } elseif ($previousRouteName == 'job-posts.show') {
                $params['job_post'] = $id;
            }
        }

        return redirect()->route($previousRouteName, $params);
    }
}
