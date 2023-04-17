@extends('layouts.admin.app')

@section('title', __('Admin Pickup Jobs'))
@section('content')
<div class="mx-5">
    @if(Session::has('success'))
    @include('layouts.admin.flash', ['message' => session()->get('message') ?? session()->get('success'), 'alertClass'=> 'success'])
    @elseif(Session::has('error') || $errors->isNotEmpty())
    @include('layouts.admin.flash', ['message' => __('An error has occurred.'), 'alertClass'=> 'danger'])
    @elseif(Session::has('warning'))
    @include('layouts.admin.flash', ['message' => session()->get('warning'), 'alertClass'=> 'danger'])
    @endif
</div>
<div class="card mx-5">
    <!-- English Pickup Jobs -->
    <div class="card-body">
        <div class="d-flex mb-0">
            <div class="d-flex align-items-end flex-grow-1 h5">
                {{ __('English Pickup Job Posts') }}
            </div>
            <div>
                <a href="#" class="btn btn-sm btn-facebook py-1 px-2 text-xs" data-toggle="modal" data-target="#jobPostModal" @click="setLanguage('{{ \App\Enums\PickupJobLanguage::English->value }}'); fetchData('job_posts');">
                    <i class="fas fa-plus-circle fa-sm"></i>
                    {{ __('Add') }}
                </a>
            </div>
        </div>
        <table class="table table-bordered table-hover table-responsive english-language-table">
            <thead>
                <tr>
                    <th width="1%">{{ __('ID') }}</th>
                    <th>{{ __('Job Title') }}</th>
                    <th>{{ __('Type of Industry') }}</th>
                    <th width="1%">{{ __('Details') }}</th>
                    <th width="1%">{{ __('Remove') }}</th>
                </tr>
            </thead>
            @if ($englishLanguages->isNotEmpty())
            <tbody data-language="{{ \App\Enums\PickupJobLanguage::English->value }}">
                @foreach ($englishLanguages as $englishLanguage)
                <tr id="{{ $englishLanguage->id }}">
                    <td class="py-2 pl-1">
                        <span class="font-weight-bold">&vellip;</span>
                        <span class="pl-3">{{ $englishLanguage->jobPost->id }}</span>
                    </td>
                    <td class="py-2">
                        <span class="tooltip-selector"
                            @if ($englishLanguage->jobPost->job_name_en && mb_strlen($englishLanguage->jobPost->job_name_en) > 20)
                                data-toggle="popover" data-content="{{ $englishLanguage->jobPost->job_name_en }}"
                            @endif
                        >
                            {{ $englishLanguage->jobPost->job_name_en ? Str::limit($englishLanguage->jobPost->job_name_en, 20) : '-----' }}
                        </span>
                    </td>
                    <td class="py-2">
                        <span class="tooltip-selector"
                            @if ($englishLanguage->jobPost->industry_en && mb_strlen($englishLanguage->jobPost->industry_en) > 20)
                                data-toggle="popover" data-content="{{ $englishLanguage->jobPost->industry_en }}"
                            @endif
                        >
                            {{ $englishLanguage->jobPost->industry_en ? Str::limit($englishLanguage->jobPost->industry_en, 20) : '-----' }}
                        </span>
                    </td>
                    <td class="text-center py-2">
                        <a href="{{ route('admin.job-posts.edit', $englishLanguage->jobPost->id) }}">
                            {{ __('Details') }}
                        </a>
                    </td>
                    <td class="text-center py-2">
                        <button type="button" class="btn btn-link btn-sm remove-btn text-danger p-0 m-0" data-toggle="modal" data-target="#deleteModal" data-url="{{ route('admin.required-languages.destroy', $englishLanguage) }}">
                            {{ __('Remove') }}
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            @else
            <tfoot>
                <tr class="text-center text-dark">
                    <td colspan="5">{{ __('No results found.') }}</td>
                </tr>
            </tfoot>
            @endif
        </table>
    </div>
    <!-- Japanese Pickup Jobs -->
    <div class="card-body">
        <div class="d-flex mb-0">
            <div class="d-flex align-items-end flex-grow-1 h5">
                {{ __('Japanese Pickup Job Posts') }}
            </div>
            <div>
                <a href="#" class="btn btn-sm btn-facebook py-1 px-2 text-xs" data-toggle="modal" data-target="#jobPostModal" @click="setLanguage('{{ \App\Enums\PickupJobLanguage::Japanese->value }}'); fetchData('job_posts');">
                    <i class="fas fa-plus-circle fa-sm"></i>
                    {{ __('Add') }}
                </a>
            </div>
        </div>
        <table class="table table-bordered table-hover table-responsive japanese-language-table">
            <thead>
                <tr>
                    <th width="1%">{{ __('ID') }}</th>
                    <th>{{ __('Job Title') }}</th>
                    <th>{{ __('Type of Industry') }}</th>
                    <th width="1%">{{ __('Details') }}</th>
                    <th width="1%">{{ __('Remove') }}</th>
                </tr>
            </thead>
            @if ($japaneseLanguages->isNotEmpty())
            <tbody data-language="{{ \App\Enums\PickupJobLanguage::Japanese->value }}">
                @foreach ($japaneseLanguages as $japaneseLanguage)
                <tr id="{{ $japaneseLanguage->id }}">
                    <td class="py-2 pl-1">
                        <span class="font-weight-bold">&vellip;</span>
                        <span class="pl-3">{{ $japaneseLanguage->jobPost->id }}</span>
                    </td>
                    <td class="py-2">
                        <span class="tooltip-selector"
                            @if ($japaneseLanguage->jobPost->job_name_jp && mb_strlen($japaneseLanguage->jobPost->job_name_jp) > 20)
                                data-toggle="popover" data-content="{{ $japaneseLanguage->jobPost->job_name_jp }}"
                            @endif
                        >
                            {{ $japaneseLanguage->jobPost->job_name_jp ? Str::limit($japaneseLanguage->jobPost->job_name_jp, 20) : '-----' }}
                        </span>
                    </td>
                    <td class="py-2">
                        <span class="tooltip-selector"
                            @if ($japaneseLanguage->jobPost->industry_jp && mb_strlen($japaneseLanguage->jobPost->industry_jp) > 20)
                                data-toggle="popover" data-content="{{ $japaneseLanguage->jobPost->industry_jp }}"
                            @endif
                        >
                            {{ $japaneseLanguage->jobPost->industry_jp ? Str::limit($japaneseLanguage->jobPost->industry_jp, 20) : '-----' }}
                        </span>
                    </td>
                    <td class="text-center py-2">
                        <a href="{{ route('admin.job-posts.edit', $japaneseLanguage->jobPost->id) }}">
                            {{ __('Details') }}
                        </a>
                    </td>
                    <td class="text-center py-2">
                        <button type="button" class="btn btn-link btn-sm remove-btn text-danger p-0 m-0" data-toggle="modal" data-target="#deleteModal" data-url="{{ route('admin.required-languages.destroy', $japaneseLanguage) }}">
                            {{ __('Remove') }}
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            @else
            <tfoot>
                <tr class="text-center text-dark">
                    <td colspan="5">{{ __('No results found.') }}</td>
                </tr>
            </tfoot>
            @endif
        </table>
    </div>
    <!-- Korean Pickup Jobs -->
    <div class="card-body">
        <div class="d-flex mb-0">
            <div class="d-flex align-items-end flex-grow-1 h5">
                {{ __('Korean Pickup Job Posts') }}
            </div>
            <div>
                <a href="#" class="btn btn-sm btn-facebook py-1 px-2 text-xs" data-toggle="modal" data-target="#jobPostModal" @click="setLanguage('{{ \App\Enums\PickupJobLanguage::Korean->value }}'); fetchData('job_posts');">
                    <i class="fas fa-plus-circle fa-sm"></i>
                    {{ __('Add') }}
                </a>
            </div>
        </div>
        <table class="table table-bordered table-hover table-responsive korean-language-table">
            <thead>
                <tr>
                    <th width="1%">{{ __('ID') }}</th>
                    <th>{{ __('Job Title') }}</th>
                    <th>{{ __('Type of Industry') }}</th>
                    <th width="1%">{{ __('Details') }}</th>
                    <th width="1%">{{ __('Remove') }}</th>
                </tr>
            </thead>
            @if ($koreanLanguages->isNotEmpty())
            <tbody data-language="{{ \App\Enums\PickupJobLanguage::Korean->value }}">
                @foreach ($koreanLanguages as $koreanLanguage)
                <tr id="{{ $koreanLanguage->id }}">
                    <td class="py-2 pl-1">
                        <span class="font-weight-bold">&vellip;</span>
                        <span class="pl-3">{{ $koreanLanguage->jobPost->id }}</span>
                    </td>
                    <td class="py-2">
                        <span class="tooltip-selector"
                            @if ($koreanLanguage->jobPost->job_name_kr && mb_strlen($koreanLanguage->jobPost->job_name_kr) > 20)
                                data-toggle="popover" data-content="{{ $koreanLanguage->jobPost->job_name_kr }}"
                            @endif
                        >
                            {{ $koreanLanguage->jobPost->job_name_kr ? Str::limit($koreanLanguage->jobPost->job_name_kr, 20) : '-----' }}
                        </span>
                    </td>
                    <td class="py-2">
                        <span class="tooltip-selector"
                            @if ($koreanLanguage->jobPost->industry_kr && mb_strlen($koreanLanguage->jobPost->industry_kr) > 20)
                                data-toggle="popover" data-content="{{ $koreanLanguage->jobPost->industry_kr }}"
                            @endif
                        >
                            {{ $koreanLanguage->jobPost->industry_kr ? Str::limit($koreanLanguage->jobPost->industry_kr, 20) : '-----' }}
                        </span>
                    </td>
                    <td class="text-center py-2">
                        <a href="{{ route('admin.job-posts.edit', $koreanLanguage->jobPost->id) }}">
                            {{ __('Details') }}
                        </a>
                    </td>
                    <td class="text-center py-2">
                        <button type="button" class="btn btn-link btn-sm remove-btn text-danger p-0 m-0" data-toggle="modal" data-target="#deleteModal" data-url="{{ route('admin.required-languages.destroy', $koreanLanguage) }}">
                            {{ __('Remove') }}
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            @else
            <tfoot>
                <tr class="text-center text-dark">
                    <td colspan="5">{{ __('No results found.') }}</td>
                </tr>
            </tfoot>
            @endif
        </table>
    </div>
    <!-- Mandarin Pickup Jobs -->
    <div class="card-body">
        <div class="d-flex mb-0">
            <div class="d-flex align-items-end flex-grow-1 h5">
                {{ __('Mandarin Pickup Job Posts') }}
            </div>
            <div>
                <a href="#" class="btn btn-sm btn-facebook py-1 px-2 text-xs" data-toggle="modal" data-target="#jobPostModal" @click="setLanguage('{{ \App\Enums\PickupJobLanguage::Mandarin->value }}'); fetchData('job_posts');">
                    <i class="fas fa-plus-circle fa-sm"></i>
                    {{ __('Add') }}
                </a>
            </div>
        </div>
        <table class="table table-bordered table-hover table-responsive mandarin-language-table">
            <thead>
                <tr>
                    <th width="1%">{{ __('ID') }}</th>
                    <th>{{ __('Job Title') }}</th>
                    <th>{{ __('Type of Industry') }}</th>
                    <th width="1%">{{ __('Details') }}</th>
                    <th width="1%">{{ __('Remove') }}</th>
                </tr>
            </thead>
            @if ($mandarinLanguages->isNotEmpty())
            <tbody data-language="{{ \App\Enums\PickupJobLanguage::Mandarin->value }}">
                @foreach ($mandarinLanguages as $mandarinLanguage)
                <tr id="{{ $mandarinLanguage->id }}">
                    <td class="py-2 pl-1">
                        <span class="font-weight-bold">&vellip;</span>
                        <span class="pl-3">{{ $mandarinLanguage->jobPost->id }}</span>
                    </td>
                    <td class="py-2">
                        <span class="tooltip-selector"
                            @if ($mandarinLanguage->jobPost->job_name_cn && mb_strlen($mandarinLanguage->jobPost->job_name_cn) > 20)
                                data-toggle="popover" data-content="{{ $mandarinLanguage->jobPost->job_name_cn }}"
                            @endif
                        >
                            {{ $mandarinLanguage->jobPost->job_name_cn ? Str::limit($mandarinLanguage->jobPost->job_name_cn, 20) : '-----' }}
                        </span>
                    </td>
                    <td class="py-2">
                        <span class="tooltip-selector"
                            @if ($mandarinLanguage->jobPost->industry_cn && mb_strlen($mandarinLanguage->jobPost->industry_cn) > 20)
                                data-toggle="popover" data-content="{{ $mandarinLanguage->jobPost->industry_cn }}"
                            @endif
                        >
                            {{ $mandarinLanguage->jobPost->industry_cn ? Str::limit($mandarinLanguage->jobPost->industry_cn, 20) : '-----' }}
                        </span>
                    </td>
                    <td class="text-center py-2">
                        <a href="{{ route('admin.job-posts.edit', $mandarinLanguage->jobPost->id) }}">
                            {{ __('Details') }}
                        </a>
                    </td>
                    <td class="text-center py-2">
                        <button type="button" class="btn btn-link btn-sm remove-btn text-danger p-0 m-0" data-toggle="modal" data-target="#deleteModal" data-url="{{ route('admin.required-languages.destroy', $mandarinLanguage) }}">
                            {{ __('Remove') }}
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            @else
            <tfoot>
                <tr class="text-center text-dark">
                    <td colspan="5">{{ __('No results found.') }}</td>
                </tr>
            </tfoot>
            @endif
        </table>
    </div>
</div>
@include('admin.pickup-jobs.modals.delete')
@include('admin.pickup-jobs.modals.job-post')
@endsection

@push('scripts')
<script>
    let languages = {};
    @foreach(\App\Enums\PickupJobLanguage::cases() as $language)
        languages['{{ $language->value }}'] = '{{ $language->text() }}';
    @endforeach
</script>
@vite('resources/js/admin/pickup-jobs/index.js')
@endpush