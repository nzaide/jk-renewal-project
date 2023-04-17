<div id="removeBlacklistModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <!-- modal-header -->
            <div class="modal-header pd-y-15 pd-x-20 bd-b-0">
                <h5 class="modal-title">{{ __('Unmark as Blacklist') }}</h5>
            </div>
            <!-- modal-body -->
            <div class="modal-body">
                <div>
                    {{ __('Remove this user from blacklist?') }}
                </div>
            </div>
            <div class="modal-footer pd-y-15 pd-x-20 bd-t-0 tx-13">
                <form method="POST" id="deleteBlacklistForm"
                    action="">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-sm btn-primary">{{ __('Remove') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>