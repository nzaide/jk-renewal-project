<div class="mb-4">
    <!-- Nav -->
    <ul class="nav nav-menu overflow-x flex-nowrap flex-md-column mx-n2">
        <li class="nav-item px-2">
            <a href="{{ route('admin.job-seekers.search') }}" class="nav-link">{{ __('Job Seekers') }}</a>
        </li>
        <li class="nav-item px-2">
            <a href="{{ route('admin.job-posts.index') }}" class="nav-link">{{ __('Job Posts') }}</a>
        </li>
        @if (auth()->user('admin')->role == \App\Http\Enum\Role::Administrator->value)
        <li class="nav-item px-2">
            <a href="{{ route('admin.required-languages.index') }}" class="nav-link">{{ __('Pickup Job Posts') }}</a>
        </li>
        @endif
        <li class="nav-item px-2">
            <a href="{{ route('admin.applications.index') }}" class="nav-link">{{ __('Applications') }}</a>
        </li>
        @if (auth()->user('admin')->role == \App\Http\Enum\Role::Administrator->value)
        <li class="nav-item px-2">
            <a href="{{ route('admin.groups.index') }}" class="nav-link">{{ __('Groups') }}</a>
        </li>
        <li class="nav-item px-2">
            <a href="{{ route('admin.admins.index') }}" class="nav-link">{{ __('Admin Users') }}</a>
        </li>
        <li class="nav-item px-2">
            <a href="{{ route('admin.options.index') }}" class="nav-link">{{ __('Master Data') }}</a>
        </li>
        @endif
    </ul>
</div>
