<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInquiryRequest;
use App\Mail\Inquiry\InquiryAdminMail;
use App\Mail\Inquiry\InquiryUserMail;
use App\Models\Admin;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class InquiryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('inquiry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreInquiryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreInquiryRequest $request)
    {
        $request = $request->all();
        Mail::to($request['email'])->send(new InquiryUserMail($request));

        $mailable = new InquiryAdminMail($request);

        Admin::chunk(
            config('mail.max_recipients'),
            function ($admins) use ($mailable) {
                Mail::to($admins)->send($mailable);
            }
        );

        return back()->with('success', 'Successfully Added');
    }
}
