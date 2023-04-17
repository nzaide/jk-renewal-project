<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFriendReferralRequest;
use App\Mail\ReferFriendAdminMail;
use App\Mail\ReferFriendJobSeekerMail;
use App\Models\Admin;
use App\Models\JobSeeker;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FriendReferralController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $jobSeeker = null;
        if (Auth::guard('web')->check()) {
            $jobSeeker = Auth::guard('web')->user();
        }

        $languages = Language::orderBy('language', 'ASC')->get();

        return view('friend-referrals.create', compact(
            'jobSeeker',
            'languages'
        ));
    }

    /**
     * Send Email no 6 and 7
     *
     * @param StoreFriendReferralRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreFriendReferralRequest $request)
    {
        $jobSeeker = null;
        if (Auth::guard('web')->check()) {
            $jobSeeker = Auth::guard('web')->user();
        }

        $resume = [];
        if ($request->file('resume') && $request->hasFile('resume')) {
            $orginalFileName = $request->file('resume')->getClientOriginalName();
            $newFileName = time() . $request->file('resume')->hashName();
            $newFilePath = 'friend-referrals/uploads/';

            // save file to storage
            $request->file('resume')->move(storage_path('app/' . $newFilePath), $newFileName);

            $resume['path'] = Storage::path($newFilePath . $newFileName);
            $resume['orginalFileName'] = $orginalFileName;
            $resume['mimeType'] = Storage::mimeType($newFilePath . $newFileName);
        }

        $jobSeekerEmail = $request->validated('jobSeeker_email');
        if ($jobSeeker instanceof JobSeeker) {
            $jobSeekerEmail = $jobSeeker->mail_address;
        }

        Mail::to($jobSeekerEmail)->send(
            new ReferFriendJobSeekerMail(
                $jobSeeker,
                $request->except('resume'),
                $resume,
            )
        );

        $mailable = new ReferFriendAdminMail(
            $jobSeeker,
            $request->except('resume'),
            $resume
        );

        Admin::chunk(
            config('mail.max_recipients'),
            function ($admins) use ($mailable) {
                Mail::to($admins)->send($mailable);
            }
        );

        Session::flash('isMailSent', true);

        return redirect()->route('friend-referrals.complete');
    }

    /**
     * Display complete page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function complete()
    {
        if (session('isMailSent')) {
            return view('friend-referrals.complete');
        }

        abort(419);
    }
}
