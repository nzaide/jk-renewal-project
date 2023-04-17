@extends('layouts.applicant.app')
@section('title', __('Privacy Policy') . ' | ')
@section('body')
<main class="top">
    <section class="section mt-5 js-anima-fade">
        <div class="container anima-fade">
            <div class="row">
                <div class="col-sm-12 mt-3">
                    <p>
                        <h3 class="mb-3">{{ __('PRIVACY POLICY') }} </h3>
                        {{ __('We, at J-K Network Services, would like to inform you that your privacy is very important to us. This is why we are practicing careful processing of your data. In ensuring compliance with the Data Privacy Act of 2012, we have created this Policy to inform our applicants, clients and stakeholders on how we process their data. The processing will include, but will not be limited to collection, sharing, recording, updating and reporting of Information (Personal and Personal Sensitive Information) gathered from Applications, Completion of Online Forms, and New user registration in the company Website. This also includes data gathered on inquiries via phone calls, SMS and all social media sites of the company.') }} 
                    </p>
                    <p>
                        <h6>{{ __('ACCEPTANCE') }}</h6>
                        {{ __('By accessing and using our website and social media sites, applying to any of our job openings or by simply making inquiries regarding our postings, services and responding to any of our marketing and promotional activities including the online forms and surveys, you hereby agree to be bound by the terms herein and you are giving your consent and acceptance to process your information with regards to your application.') }}
                    </p>
                    <p>
                        <h6>{{ __('INFORMATION') }}</h6>
                        {{ __('J-K Network Services’ main function is to provide candidates to our client companies. Information collected or provided by Candidates and Clients are being treated with strictest confidence. Information may include but are not limited to;') }}
                    </p>
                    <p>
                        {{ __('Personal Information:') }} <br>
                        {{ __('Complete Name, Gender, Nationality, Birth date, Marital Status, Pictures, Educational Attainment, Working Experience.') }}
                    </p>
                    <p>
                        {{ __('Contact Information:') }} <br>
                        {{ __('Address, Phone Number, Mobile Number, Email, Address, Social Media and Messaging App User Name.') }}
                    </p>
                    <p>
                        {{ __('Information may be collected and gathered through interviews, access on website and company social media sites, applying to any job openings or simply making inquiries regarding postings and services and responding to any of our marketing and promotional activities, including online forms and survey. Another source of this information may be external sources. (Including but not limited to social media sites like Facebook, Linkedin, Instagram, Twitter and service providers like Jobstreet, Mynimo and other Job Portals that J-K Network Services uses.)') }}
                    </p>
                    <p>
                        {{ __('The information will be stored for the applicant’s job application and record purposes. Our team will directly coordinate with the candidates to make sure that the information we have collected and gathered are accurate and precise.') }}
                    </p>
                    <p>
                        <h6>{{ __('USE AND SHARING OF YOUR INFORMATION') }}</h6>
                        {{ __('We will not share, rent, trade, dispose or sell your information to third parties outside J-K Network Services without your consent.') }}
                    </p>
                    <p>
                        {{ __('Information collected, gathered and being stored will be used only for legitimate purposes,') }}
                    </p>
                    <p>
                        {{ __('During your job application to J-K Network Services’ client companies. J-K Network’s team will always first request or ask for the applicant’s approval or consent, before providing or sharing the information to client companies. The team will also get in touch with the applicants beforehand, and will discuss the necessary details.') }}
                    </p>
                    <p>
                        {{ __('Advertising and promotion purposes, which may include, but shall not be limited to receiving of newsletter, monthly updates through email or SMS, surveys and others. (You have the right to unsubscribe in any of these promotions or updates)') }}
                    </p>
                    <p>
                        {{ __('There may be instances that your personal information will be shared for the purposes reporting, submission or complying with regulatory requirement to government agencies under applicable laws, rules and regulations.') }}
                    </p>
                    <p>
                        {{ __('Information can only be accessed by authorized personnel. All information will be treated with strictest confidence. You have the right to request for deletion of your data. Upon request for deletion, all hard copies will be shredded and digital or online information will be deleted as well.') }}
                    </p>
                    <p>
                        {{ __('Your privacy is very important to us so we make sure that we keep your information confidential and secured.') }}
                    </p>
                    <p>
                        <h6>{{ __('CHANGES') }}</h6>
                        {{ __('The content of this Policy may change without notice. You should check this page from time to time to keep updated of the current changes.') }}
                    </p>
                    <p>
                        <h6>{{ __('CONTACT US') }}</h6>
                        {{ __('If you have any comments, feedback, questions and concerns regarding on how we process your data, please free to send us an email to jkmanpower@jp-network-e.com or call us at (02) 245 2829.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection