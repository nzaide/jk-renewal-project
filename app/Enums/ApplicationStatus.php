<?php

namespace App\Enums;

enum ApplicationStatus: int
{
    case Open = 1;
    case ResumeScreening = 2;
    case FailedScreening = 3;
    case Invited = 4;
    case FirstInterview = 5;
    case SecondInterview = 6;
    case ProvidedContactNo = 7;
    case FinalInterview = 8;
    case JobOffer = 9;
    case DeclinedJobOffer = 10;
    case FailedInterview = 11;
    case AcceptJobOffer = 12;
    case SuccessfulHiring = 13;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::Open => __('Open'),
            self::ResumeScreening => __('Resume Screening'),
            self::FailedScreening => __('Failed Screening'),
            self::Invited => __('Invited'),
            self::FirstInterview => __('First Interview'),
            self::SecondInterview => __('Second Interview'),
            self::ProvidedContactNo => __('Provided Contact No'),
            self::FinalInterview => __('Final Interview'),
            self::JobOffer => __('Job Offer'),
            self::DeclinedJobOffer => __('Declined Job Offer'),
            self::FailedInterview => __('Failed Interview'),
            self::AcceptJobOffer => __('Accept Job Offer'),
            self::SuccessfulHiring => __('Successful Hiring'),
        };
    }
}
