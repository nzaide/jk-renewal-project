@extends('layouts.admin.app')

@section('content')
<div class="mx-5">
    @if(Session::has('success'))
    @include('layouts.admin.flash', ['message' => session()->get('success'), 'alertClass'=> 'success'])
    @elseif(Session::has('error') || $errors->isNotEmpty())
    @include('layouts.admin.flash', ['message' => __('An error has occurred.'), 'alertClass'=> 'danger'])
    @endif
</div>
<div id="accordion1"  class="accordion accordion-spaced mx-5">
    <div class="card">
        <div class="card-header py-4" data-toggle="collapse" role="button" data-target="#collapse1">
            <h6 class="mb-0">{{ __('Industry') }}</h6>
        </div>
        <div id="collapse1"  @class(['collapse', 'show' => Session::has('showCollapse.collapse1')])  data-parent="#accordion1">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="input-group col-9">
                        <input type="text" class="form-control" value="" placeholder="Search" v-model="industries.search">
                        <div class="input-group-append">
                            <button
                                type="button"
                                class="btn btn-facebook"
                                @click="fetchData('industries', null, industries.search)"
                            >
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="dropdown col-3">
                        <button class="btn btn-facebook dropdown-toggle w-100" type="button" data-toggle="dropdown">
                            <i class="fas fa-plus-circle"></i> {{ __('Add') }}
                        </button>
                        <div class="dropdown-menu">
                            <button
                                type="button"
                                class="dropdown-item"
                                data-toggle="modal"
                                data-target="#upsertModal"
                                @click="setUpsertModal('industries', 'POST')"
                            >
                                {{ __('Main Category') }}
                            </button>
                            <button
                                type="button"
                                class="dropdown-item"
                                data-toggle="modal"
                                data-target="#upsertModal"
                                @click="setUpsertModal('industries', 'POST', null, '', true)"
                            >
                                {{ __('Sub Category') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div v-if="industries.data.length" class="overflow-auto">
                    <table class="table">
                        <tbody>
                            <template v-for="industry in industries.data">
                                <tr>
                                    <td class="align-middle w-100">@{{ industry.name }}</td>
                                    <td class="align-middle">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-primary edit-btn"
                                            data-toggle="modal"
                                            data-target="#upsertModal"
                                            @click="setUpsertModal('industries', 'PUT', industry.id, industry.name)"
                                        >
                                            {{ __('Edit') }}
                                        </button>
                                    </td>
                                    <td class="align-middle">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-danger delete-btn"
                                            data-toggle="modal"
                                            data-target="#deleteModal"
                                            @click="setDeleteModal('industries', industry.id)"
                                        >
                                            {{ __('Delete') }}
                                        </button>
                                    </td>
                                </tr>
                                <tr v-for="sub_category in industry.sub_categories">
                                    <td class="align-middle w-100 pl-5">@{{ sub_category.name }}</td>
                                    <td class="align-middle">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-primary edit-btn"
                                            data-toggle="modal"
                                            data-target="#upsertModal"
                                            @click="setUpsertModal('industries', 'PUT', sub_category.id, sub_category.name, sub_category.parent_id)"
                                        >
                                            {{ __('Edit') }}
                                        </button>
                                    </td>
                                    <td class="align-middle">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-danger delete-btn"
                                            data-toggle="modal"
                                            data-target="#deleteModal"
                                            @click="setDeleteModal('industries', sub_category.id)"
                                        >
                                            {{ __('Delete') }}
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
                <div v-else class="text-center">
                    {{ __('No results found.') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div id="accordion2"  class="accordion accordion-spaced mx-5">
    <div class="card">
        <div class="card-header py-4" data-toggle="collapse" role="button" data-target="#collapse2">
            <h6 class="mb-0">{{ __('Field and Job Title') }}</h6>
        </div>
        <div id="collapse2"  @class(['collapse', 'show' => Session::has('showCollapse.collapse2')])  data-parent="#accordion2">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="input-group col-9">
                        <input type="text" class="form-control" value="" placeholder="Search" v-model="job_fields.search">
                        <div class="input-group-append">
                            <button
                                type="button"
                                class="btn btn-facebook"
                                @click="fetchData('job_fields', null, job_fields.search)"
                            >
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="dropdown col-3">
                        <button class="btn btn-facebook dropdown-toggle w-100" type="button" data-toggle="dropdown">
                            <i class="fas fa-plus-circle"></i> {{ __('Add') }}
                        </button>
                        <div class="dropdown-menu">
                            <button
                                type="button"
                                class="dropdown-item"
                                data-toggle="modal"
                                data-target="#upsertModal"
                                @click="setUpsertModal('job_fields', 'POST')"
                            >
                                {{ __('Main Category') }}
                            </button>
                            <button
                                type="button"
                                class="dropdown-item"
                                data-toggle="modal"
                                data-target="#upsertModal"
                                @click="setUpsertModal('job_fields', 'POST', null, '', true)"
                            >
                                {{ __('Sub Category') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div v-if="job_fields.data.length" class="overflow-auto">
                    <table class="table">
                        <tbody>
                            <template v-for="job_field in job_fields.data">
                                <tr>
                                    <td class="align-middle w-100">@{{ job_field.name }}</td>
                                    <td class="align-middle">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-primary edit-btn"
                                            data-toggle="modal"
                                            data-target="#upsertModal"
                                            @click="setUpsertModal('job_fields', 'PUT', job_field.id, job_field.name)"
                                        >
                                            {{ __('Edit') }}
                                        </button>
                                    </td>
                                    <td class="align-middle">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-danger delete-btn"
                                            data-toggle="modal"
                                            data-target="#deleteModal"
                                            @click="setDeleteModal('job_fields', job_field.id)"
                                        >
                                            {{ __('Delete') }}
                                        </button>
                                    </td>
                                </tr>
                                <tr v-for="sub_category in job_field.sub_categories">
                                    <td class="align-middle w-100 pl-5">@{{ sub_category.name }}</td>
                                    <td class="align-middle">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-primary edit-btn"
                                            data-toggle="modal"
                                            data-target="#upsertModal"
                                            @click="setUpsertModal('job_fields', 'PUT', sub_category.id, sub_category.name, sub_category.parent_id)"
                                        >
                                            {{ __('Edit') }}
                                        </button>
                                    </td>
                                    <td class="align-middle">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-danger delete-btn"
                                            data-toggle="modal"
                                            data-target="#deleteModal"
                                            @click="setDeleteModal('job_fields', sub_category.id)"
                                        >
                                            {{ __('Delete') }}
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
                <div v-else class="text-center">
                    {{ __('No results found.') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div id="accordion3"  class="accordion accordion-spaced mx-5">
    <div class="card">
        <div class="card-header py-4" data-toggle="collapse" role="button" data-target="#collapse3">
            <h6 class="mb-0">{{ __('Interested Jobs') }}</h6>
        </div>
        <div id="collapse3"  @class(['collapse', 'show' => Session::has('showCollapse.collapse3')])  data-parent="#accordion3">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="input-group col-9">
                        <input type="text" class="form-control" value="" placeholder="Search" v-model="jobs.search">
                        <div class="input-group-append">
                            <button
                                type="button"
                                class="btn btn-facebook"
                                @click="fetchData('jobs', null, jobs.search)"
                            >
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-3">
                        <button 
                            class="btn btn-facebook w-100" 
                            type="button" 
                            data-toggle="modal"
                            data-target="#upsertModal"
                            @click="setUpsertModal('jobs', 'POST')"
                        >
                            <i class="fas fa-plus-circle"></i> {{ __('Add') }}
                        </button>
                    </div>
                </div>
                <div v-if="jobs.data.length" class="overflow-auto">
                    <table class="table">
                        <tbody>
                            <template v-for="job in jobs.data">
                                <tr>
                                    <td class="align-middle w-100">@{{ job.name }}</td>
                                    <td class="align-middle">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-primary edit-btn"
                                            data-toggle="modal"
                                            data-target="#upsertModal"
                                            @click="setUpsertModal('jobs', 'PUT', job.id, job.name)"
                                        >
                                            {{ __('Edit') }}
                                        </button>
                                    </td>
                                    <td class="align-middle">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-danger delete-btn"
                                            data-toggle="modal"
                                            data-target="#deleteModal"
                                            @click="setDeleteModal('jobs', job.id)"
                                        >
                                            {{ __('Delete') }}
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
                <div v-else class="text-center">
                    {{ __('No results found.') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div id="accordion4"  class="accordion accordion-spaced mx-5">
    <div class="card">
        <div class="card-header py-4" data-toggle="collapse" role="button" data-target="#collapse4">
            <h6 class="mb-0">{{ __('Other Tags') }}</h6>
        </div>
        <div id="collapse4"  @class(['collapse', 'show' => Session::has('showCollapse.collapse4')])  data-parent="#accordion4">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="input-group col-9">
                        <input type="text" class="form-control" value="" placeholder="Search" v-model="other_tags.search">
                        <div class="input-group-append">
                            <button
                                type="button"
                                class="btn btn-facebook"
                                @click="fetchData('other_tags', null, other_tags.search)"
                            >
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-3">
                        <button 
                            class="btn btn-facebook w-100" 
                            type="button" 
                            data-toggle="modal"
                            data-target="#upsertModal"
                            @click="setUpsertModal('other_tags', 'POST')"
                        >
                            <i class="fas fa-plus-circle"></i> {{ __('Add') }}
                        </button>
                    </div>
                </div>
                <div v-if="other_tags.data.length" class="overflow-auto">
                    <table class="table">
                        <tbody>
                            <template v-for="other_tag in other_tags.data">
                                <tr>
                                    <td class="align-middle w-100">@{{ other_tag.name }}</td>
                                    <td class="align-middle">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-primary edit-btn"
                                            data-toggle="modal"
                                            data-target="#upsertModal"
                                            @click="setUpsertModal('other_tags', 'PUT', other_tag.id, other_tag.name)"
                                        >
                                            {{ __('Edit') }}
                                        </button>
                                    </td>
                                    <td class="align-middle">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-danger delete-btn"
                                            data-toggle="modal"
                                            data-target="#deleteModal"
                                            @click="setDeleteModal('other_tags', other_tag.id)"
                                        >
                                            {{ __('Delete') }}
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
                <div v-else class="text-center">
                    {{ __('No results found.') }}
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.options.modals.upsert')
@include('admin.options.modals.delete')
@endsection

@push('scripts')
@vite('resources/js/admin/options/index.js')
@endpush
