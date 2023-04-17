<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreMailRequest;
use App\Mail\Admin\AdminMessaged;
use App\Models\Admin;
use App\Models\JobSeeker;
use App\Models\Mail;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail as MailFacade;

class MailController extends Controller
{
    /**
     * List mails
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $admin = $request->user('admin');

        abort_unless($admin instanceof Admin, 403);

        $mails = Mail::latest()
            ->where('admin_id', $admin->id)
            ->paginate(
                perPage: 15,
                columns: ['id', 'title', 'created_at'],
            );

        return response()->json($mails);
    }

    /**
     * Store mail
     *
     * @param \App\Http\Requests\Admin\StoreMailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreMailRequest $request)
    {
        $admin = $request->user('admin');

        abort_unless($admin instanceof Admin, 403);

        $jobSeekers = JobSeeker::select('id', 'mail_address')
            ->where('is_blacklist', false);

        $jobSeekerIds = $request->validated('job_seekers.*.id');
        if ($jobSeekerIds && is_array($jobSeekerIds)) {
            $jobSeekers = $jobSeekers->whereIn('id', $jobSeekerIds);
        }

        DB::transaction(function () use ($admin, $request, $jobSeekers) {
            /** @var \App\Models\Mail */
            $mail = Mail::create([
                'admin_id' => $admin->id,
                'title' => $request->validated('title'),
                'contents' => $request->validated('contents'),
            ]);

            $attachment = $request->file('attachment');
            $currentDateTime = now();

            $jobSeekers->chunk(
                config('mail.max_recipients'),
                function ($jobSeekers) use ($admin, $attachment, $currentDateTime, $mail) {
                    if ($attachment === null || $attachment instanceof UploadedFile) {
                        $users = $jobSeekers->pluck('mail_address');

                        $mailable = new AdminMessaged($admin, $mail, $attachment);
                        $mailable = $mailable->afterCommit();

                        MailFacade::to($users)->send($mailable);
                    }

                    $mail->mailHistories()->createMany(
                        $jobSeekers->map(fn ($jobSeeker) => [
                            'recepient_id' => $jobSeeker->id,
                            'sent_at' => $currentDateTime,
                        ])
                    );
                }
            );
        });

        session()->flash('success', __('Email successfully sent.'));

        return response()->json();
    }
}
