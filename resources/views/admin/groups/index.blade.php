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
        <form action="{{ route('admin.groups.store') }}" method="POST">
            @csrf
            <div class="d-flex">
                <div class="col-3 px-1">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="{{ __('Group') }}">
                    @error("name")
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-3 px-0">
                    <input type="text" name="sender_name" class="form-control" value="{{ old('sender_name') }}" placeholder="{{ __('Sender Name') }}">
                    @error("sender_name")
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-3 px-1">
                    <input type="text" name="mail_address" class="form-control" value="{{ old('mail_address') }}" placeholder="{{ __('Email') }}">
                    @error("mail_address")
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-3 px-0">
                    <button type="submit" class="btn btn-facebook">
                        <i class="fas fa-plus"></i> {{ __('Add New Group') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card mx-5 mt-4">
    <div class="card-body">
        <h5 class="card-title">{{ __('Admin Groups') }}</h5>
        @if ($groups->isNotEmpty())
        <div class="overflow-auto">
            <table class="table">
                <thead>
                    <th>{{ __('Group') }}</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($groups as $group)
                    <tr>
                        <td class="align-middle">{{ $group->name }}</td>
                        <td class="align-middle">{{ $group->sender_name }}</td>
                        <td class="align-middle">{{ $group->mail_address }}</td>
                        <td class="align-middle w-10">
                            <button type="button" class="btn btn-sm btn-outline-primary edit-btn" data-id="{{ $group->id }}">{{ __('Edit') }}</button>
                            <button
                                type="button"
                                class="btn btn-sm btn-outline-danger delete-btn"
                                data-toggle="modal"
                                data-target="#confirmationModal"
                                data-action="{{ route('admin.groups.destroy', $group) }}"
                            >
                                {{ __('Delete') }}
                            </button>
                        </td>
                    </tr>
                    <tr class="d-none" id="editFields{{ $group->id }}">
                        <td class="px-0">
                            <input type="text" name="name" class="form-control" value="{{ $group->name }}" placeholder="{{ __('Group') }}">
                            <div class="text-danger mt-1 validation-msg" data-name="name">
                            </div>
                        </td>
                        <td class="px-1">
                            <input type="text" name="sender_name" class="form-control" value="{{ $group->sender_name }}" placeholder="{{ __('Sender Name') }}">
                            <div class="text-danger mt-1 validation-msg" data-name="sender_name">
                            </div>
                        </td>
                        <td class="px-0">
                            <input type="text" name="mail_address" class="form-control" value="{{ $group->mail_address }}" placeholder="{{ __('Email') }}">
                            <div class="text-danger mt-1 validation-msg" data-name="mail_address">
                            </div>
                        </td>
                        <td class="align-middle w-10">
                            <button type="button" class="btn btn-sm btn-outline-success save-btn" data-id="{{ $group->id }}">{{ __('Save') }}</button>
                            <button
                                type="button"
                                class="btn btn-sm btn-outline-danger delete-btn"
                                data-toggle="modal"
                                data-target="#confirmationModal"
                                data-action="{{ route('admin.groups.destroy', $group) }}"
                            >
                                {{ __('Delete') }}
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center">
            {{ __('No results found.') }}
        </div>
        @endif
    </div>
</div>

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
            {{ __('Are you sure to delete the group ?') }}
        </div>
        <div class="modal-footer">
            <form action="" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
@vite('resources/js/admin/groups/index.js')
@endpush
