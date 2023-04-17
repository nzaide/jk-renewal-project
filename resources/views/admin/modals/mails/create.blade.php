<div class="modal fade" id="mail-create-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ __('Send Email') }}
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="mail-create-form" method="POST" action="{{ route('admin.mails.store') }}" class="modal-body"
                novalidate>

                <input type="hidden" name="send_to_all" value="0">

                <div class="form-group row">
                    <label class="col-md-2">
                        {{ __('From') }}
                    </label>

                    <div class="col-md-10">
                        {{ auth()->user()->group->mail_address }}

                        <span>
                            {{ '<' . auth()->user()->group->sender_name . '>'}}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-md-2">
                        {{ __('Subject') }}
                    </label>

                    <div class="col-md-10">
                        <input type="text" name="title" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <textarea name="contents"></textarea>
                </div>

                <div class="form-group">
                    <input type="file" name="attachment" class="form-control-file">
                </div>
            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" form="mail-create-form" class="btn btn-primary">
                    {{ __('Send Email') }}
                </button>
            </div>
        </div>
    </div>
</div>

@push('modals')
@include('admin.modals.mails.empty')
@endpush

@push('scripts')
@vite('resources/js/admin/modals/mails/create.js')
@endpush