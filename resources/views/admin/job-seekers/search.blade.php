@extends('layouts.admin.app')

@section('content')
<div class="mx-5">
    @if(Session::has('success'))
    @include('layouts.admin.flash', ['message' => session()->get('success'), 'alertClass'=> 'success'])
    @elseif(Session::has('error') || $errors->isNotEmpty())
    @include('layouts.admin.flash', ['message' => __('An error has occurred.'), 'alertClass'=> 'danger'])
    @endif
</div>

<div class="card mx-5">
    <div class="card-body">
        <h5 class="card-title">
            {{ __('Search') }}
        </h5>

        <form id="search-form" method="GET" action="{{ route('admin.job-seekers.search') }}" novalidate>
            @include('admin.job-seekers.partials.basic-search')

            <div class="form-group text-right">
                <button type="button" data-toggle="collapse" data-target="#advanced-search-panel"
                    class="btn btn-link btn-sm">
                    {{ __('Add more conditions') }}
                </button>

                <button type="reset" class="btn btn-link btn-sm text-danger">
                    {{ __('Clear') }}
                </button>
            </div>

            <div id="advanced-search-panel" @class(['collapse', 'show'=> request()->boolean('asp_open')])>
                <input type="hidden" id="asp-state-indicator" name="asp_open" value="{{ request('asp_open') }}">

                @include('admin.job-seekers.partials.advanced-search')
            </div>

            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <button type="submit" class="btn btn-block btn-primary btn-sm">
                        {{ __('Search') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card mx-5">
    <div class="card-body">
        <h5 class="card-title">{{ __('Job Seekers') }}</h5>
        <div class="form-group row">
            <div class="col-6">
                {{ trans_choice('{1} :count item|[2,*] :count items', $jobSeekers->total()) }}
            </div>

            <div class="col-6 text-right">
                <a href="{{ route('admin.job-seekers.create') }}" class="btn btn-sm btn-facebook">
                    {{ __('Add new data') }}
                </a>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 d-md-flex">
                <div class="mb-2 mb-md-0 mr-md-3">
                    <div class="dropdown">
                        <button type="button" data-toggle="dropdown"
                            class="btn btn-sm btn-outline-info dropdown-toggle py-0">
                            <span class="fa fa-envelope"></span>
                            {{ __('Send email') }}
                        </button>

                        <div class="dropdown-menu">
                            <button type="button" class="dropdown-item" data-action="show-mail-create-modal">
                                {{ __('Send email to selected users') }}
                            </button>
                            <button type="button" class="dropdown-item" data-action="show-mail-create-modal"
                                data-send-mail-to-all>
                                {{ __('Send email to all except blacklisted') }}
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mb-2 mb-md-0">
                    <button type="button" data-toggle="modal" data-target="#mail-list-modal"
                        class="btn btn-sm btn-outline-info py-0">
                        <span class="fa fa-paper-plane"></span>
                        {{ __('Show sent mails') }}
                    </button>
                </div>
            </div>

            <div class="col-md-6 d-md-flex justify-content-end">
                <div class="mr-3">
                    {{ trans_choice(
                    '{1} Search Condition (:count)|[2,*] Search Conditions (:count)',
                    $searchConditionCount) }}
                </div>

                <div>
                    <select id="per-page-limiter" name="per_page" form="search-form">
                        @php $perPageLimits = [10, 20, 30, 50, 100] @endphp

                        @foreach ($perPageLimits as $perPageLimit)
                        <option value="{{ $perPageLimit }}" @selected(request('per_page', 20)==$perPageLimit)>
                            {{ $perPageLimit }}
                        </option>
                        @endforeach
                    </select>

                    <span>{{ __('per page') }}</span>
                </div>
            </div>
        </div>

        <table class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col">{{ __('ID') }}</th>
                    <th scope="col">
                        <input type="checkbox" class="align-middle" data-action="select-all-user">
                    </th>
                    <th scope="col">{{ __('Gender') }}</th>
                    <th scope="col">{{ __('Age') }}</th>
                    <th scope="col">{{ __('BR') }}</th>
                    <th scope="col">{{ __('CBR') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Actions') }}</th>
                    <th scope="col" colspan="2">{{ __('Blacklist') }}</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($jobSeekers as $jobSeeker)
                <tr>
                    <th scope="row">{{ $jobSeeker->id }}</th>
                    <td>
                        <input type="checkbox" class="align-middle" data-action="select-user"
                            data-selected-user="{{ $jobSeeker->id }}" @disabled($jobSeeker->is_blacklist)>
                    </td>
                    <td>
                        {{ \App\Enums\JobSeekerGender::tryFrom($jobSeeker->gender)?->text() ?? '-----' }}
                    </td>
                    <td>
                        {{ $jobSeeker->birth_date?->age ?? '--' }}
                    </td>
                    <td>
                        @if ($jobSeeker->blind_resume)
                        <a href="{{ route('admin.job-seekers.blind-resume.download', $jobSeeker) }}" download>
                            <span class="fa fa-download fa-fw"></span>
                        </a>
                        @else
                        --
                        @endif
                    </td>
                    <td>
                        @if ($jobSeeker->complete_blind_resume)
                        <a href="{{ route('admin.job-seekers.complete-blind-resume.download', $jobSeeker) }}" download>
                            <span class="fa fa-download fa-fw"></span>
                        </a>
                        @else
                        --
                        @endif
                    </td>
                    <td>{{ $jobSeeker->fullname ?? '-----' }}</td>
                    <td>
                        <a href="{{ route('admin.job-seekers.edit', $jobSeeker) }}"
                            class="btn btn-block btn-outline-primary btn-sm py-0">
                            {{ __('Edit') }}
                        </a>
                    </td>
                    <td>{{ $jobSeeker->is_blacklist ? __('Listed') : '-----' }}</td>
                    <td>
                        @if ($jobSeeker->is_blacklist)
                        <button type="button" class="btn btn-block btn-outline-primary btn-sm py-0 remove-blacklist"
                            data-id="{{ $jobSeeker->id }}"
                            data-toggle="modal"
                            data-target="#removeBlacklistModal"
                            data-action="{{ route('admin.job-seekers.blacklist.destroy', $jobSeeker->id) }}">
                            {{ __('Remove') }}
                        </button>

                        @else
                        <button type="button" class="btn btn-block btn-outline-danger btn-sm py-0 add-blacklist"
                            data-id="{{ $jobSeeker->id }}"
                            data-toggle="modal"
                            data-target="#markBlacklistModal"
                            data-action="{{ route('admin.job-seekers.blacklist.store', $jobSeeker->id) }}">
                            {{ __('Add') }}
                        </button>

                        @endif
                    </td>
                </tr>
                @empty
                <tr>

                    <td colspan="9" class="text-center">
                        {{ __('No result found.') }}
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            <div class="d-flex justify-content-center">
                {{ $jobSeekers->links() }}
            </div>
            <div class="d-flex justify-content-end mt-2">
                <select id="per-page-limiter-bottom" form="search-form">
                    @php $perPageLimits = [10, 20, 30, 50, 100] @endphp

                    @foreach ($perPageLimits as $perPageLimit)
                    <option value="{{ $perPageLimit }}" @selected(request('per_page', 20)==$perPageLimit)>
                        {{ $perPageLimit }}
                    </option>
                    @endforeach
                </select>

                <span>&nbsp;{{ __('per page') }}</span>
            </div>
        </div>
    </div>
</div>

@endsection

@push('modals')
@include('admin.modals.mails.create')
@include('admin.modals.mails.index')
@endpush

@push('scripts')
@vite('resources/js/admin/job-seekers/search.js')
@endpush

@push('modals')
@include('admin.job-seekers.partials.remove-blacklist-modal')
@include('admin.job-seekers.partials.mark-blacklist-modal')
@endpush

