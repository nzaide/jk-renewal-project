@extends('layouts.admin.app')

@section('content')
<div class="card mx-5">
    <div class="card-body">
        <h5 class="card-title">{{ __('Edit Account') }}</h5>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.admins.update', $admin) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Name') }} <i class="text-danger">*</i></label>
                        <input type="text" name="fullname" value="{{ old('fullname', $admin->fullname) }}" class="form-control form-control-prepend">
                        @error("fullname")
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Email') }} <i class="text-danger">*</i></label>
                        <input type="text" name="mail_address" value="{{ old('mail_address', $admin->mail_address) }}" class="form-control form-control-prepend">
                        @error("mail_address")
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Password') }} <i class="text-danger">*</i></label>
                        <input type="password" name="password" class="form-control form-control-prepend">
                        @error("password")
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Confirm password') }} <i class="text-danger">*</i></label>
                        <input type="password" name="password_confirmation" class="form-control form-control-prepend">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Role') }} <i class="text-danger">*</i></label>
                        <select name="role" class="form-control">
                            <option value="">
                            </option>
                            @foreach (\App\Http\Enum\Role::cases() as $role)
                            <option value="{{ $role->value }}" @selected($role->value == old('role', $admin->role))>
                                {{ $role->getDescription() }}
                            </option>
                            @endforeach
                        </select>
                        @error("role")
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Group') }} <i class="text-danger">*</i></label>
                        @foreach ($groups as $group)
                        <div class="custom-control custom-radio">
                            <input
                                type="radio"
                                id="group{{ $loop->index }}"
                                name="group_id"
                                class="custom-control-input"
                                value="{{ $group->id }}"
                                @checked($group->id == old('group_id', $admin->group_id))
                            >
                            <label class="custom-control-label" for="group{{ $loop->index }}">{{ $group->mail_address }}</label>
                        </div>
                        @endforeach
                        @error("group_id")
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-sm btn-primary col-3">
                            {{ __('Save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection