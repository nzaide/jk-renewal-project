<div class="modal fade" id="update-application-status-modal{{ $application->id }}" data-id="{{ $application->id }}" role="dialog">
    <div class="modal-dialog modal-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-dark font-18 bold">{{ __('Confirmation') }}</h4>
                <button class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <form
                action="{{ route('admin.applications.status.update', $application) }}"
                class="update-application-status-form{{ $application->id }}"
                method="POST"
                data-id="{{ $application->id }}"
            >
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    {{ __('Are you sure to change status?') }}
                    <input id="application_status" name="application_status" hidden>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm " data-dismiss="modal" type="button">
                        {{ __('No') }}
                    </button>
                    <button class="btn btn-facebook btn-sm submit-btn" data-dismiss="modal" type="button">
                        {{ __('Yes') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
