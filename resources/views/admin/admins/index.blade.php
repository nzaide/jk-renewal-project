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
        <div class="d-flex">
            <a href="{{ route('admin.admins.create') }}" class="btn btn-facebook p-0 d-flex flex-column justify-content-center col-2">
                + {{ __('Add User') }}
            </a>
            <div class="dropdown col-3">
                <button class="btn btn-info dropdown-toggle w-100" type="button" data-toggle="dropdown">
                    ... {{ __('Actions') }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button
                        type="button"
                        class="dropdown-item text-danger"
                        data-action="{{ route('admin.admins.destroy') }}"
                        data-method="DELETE"
                        @click="changeToActive"
                    >
                        Delete
                    </button>
                    <div>
                        <h6 class="dropdown-header">{{ __('Change role to') }}</h6>
                        @foreach (\App\Http\Enum\Role::cases() as $role)
                        <button
                            type="button"
                            class="dropdown-item pl-4 role-buttons"
                            data-action="{{ route('admin.admins.role.update') }}"
                            data-role="{{ $role->value }}"
                            data-method="PUT"
                            @click="changeToActive"
                        >{{ $role->getDescription() }}</button>
                        @endforeach
                    </div>
                </div>
            </div>
            <button
                type="button"
                class="btn btn-danger rounded-pill col-1 p-0"
                data-toggle="modal"
                data-target="#confirmationModal"
                @click="setAdminIds"
            >
                {{ __('Apply') }}
            </button>
            <div class="col-6 pr-0">
                <div class="input-group">
                <input type="text" class="form-control" value="" v-model="search">
                <div class="input-group-append">
                    <button
                        type="button"
                        class="btn btn-facebook"
                        @click="fetchData('getAdminAccounts', null, search)"
                    >
                        <i class="fas fa-search"></i> {{ __('Search User') }}
                    </button>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mx-5 mt-4">
    <div class="card-body">
        <h5 class="card-title">{{ __('Admin Users') }}</h5>
        <div class="d-flex justify-content-end">@{{ getAdminAccounts.total }} {{ __(' items') }}</div>
        <form id="tableForm" class="overflow-auto">
            <table class="table">
                <thead>
                    <th></th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Role') }}</th>
                </thead>
                <tbody>
                    <tr v-for="(admin) in getAdminAccounts.data">
                        <td><input type="checkbox" name="ids[]" :value="admin.id"/>
                        <td class="w-100">
                            <a :href="'/admin/admins/' + admin.id + '/edit'">@{{ admin.fullname }}</a>
                        </td>
                        <td>@{{ admin.mail_address }}</td>
                        <td>@{{ roles[admin.role] }}</td>
                    </tr>
                </tbody>
            </table>
        </form>

        <nav v-if="getAdminAccounts.lastPage > 1" class="mt-3">
            <ul class="pagination justify-content-center">
                <li v-if="getAdminAccounts.currentPage == getAdminAccounts.startPage">
                    <div class="page-item disabled">
                        <a class="page-link border-0 shadow-none" href="#" tabindex="-1" aria-disabled="true">
                            <i class="fas fa-angle-left"></i>
                        </a>
                    </div>
                </li>
                <li v-else>
                    <div class="page-item">
                        <a class="page-link border-0 shadow-none" href="#" @click.prevent="selectPage(getAdminAccounts.prevPageUrl)">
                            <i class="fas fa-angle-left"></i>
                        </a>
                    </div>
                </li>
                <li v-for="page in getAdminAccounts.links">
                    <div v-if="page.label >= 1">
                        <div v-if="page.active" class="page-item active">
                            <span class="page-link">@{{ page.label }}</span>
                        </div>
                        <div v-else class="page-item">
                            <a class="page-link" href="#" @click.prevent="selectPage(page.url)">@{{ page.label }}</a>
                        </div>
                    </div>
                </li>
                <li v-if="getAdminAccounts.currentPage == getAdminAccounts.lastPage">
                    <div class="page-item disabled">
                        <a class="page-link border-0 shadow-none" href="#" tabindex="-1" aria-disabled="true">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                </li>
                <li v-else>
                    <div class="page-item">
                        <a class="page-link border-0 shadow-none" href="#" @click.prevent="selectPage(getAdminAccounts.nextPageUrl)">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div v-if="getAdminAccounts.total == 0" class="text-center">
            {{ __('No results found.') }}
        </div>
    </div>
</div>

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
            {{ __('Are you sure you want to ') }}<span id="confirmationMsg"></span>?
        </div>
        <div class="modal-footer">
            <form action="{{ route('admin.admins.role.update') }}" method="POST" id="mainForm">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="ids" id="ids"/>
                <input type="hidden" name="role" id="role"/>
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="submit" class="btn btn-sm btn-danger">{{ __('Apply') }}</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
    const roles = {
        @foreach(\App\Http\Enum\Role::cases() as $role)
        {{ $role->value }}: '{{ $role->getDescription() }}',
        @endforeach
    };
</script>
@vite('resources/js/admin/admins/index.js')
@endpush
