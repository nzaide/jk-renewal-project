<div id="markBlacklistModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <!-- modal-header -->
            <div class="modal-header pd-y-15 pd-x-20 bd-b-0">
                <h5 class="modal-title">{{ __('Mark as Blacklist') }}</h5>
            </div>
            <!-- modal-body -->
            <div class="modal-body">
                <div>
                    {{ __('Add this user to blacklist?') }}
                </div>
            </div>
            <div class="modal-footer pd-y-15 pd-x-20 bd-t-0 tx-13">
                <form method="POST" id="markBlacklistForm"
                    action="">
                    @csrf
                    @method('POST')
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-sm btn-danger">{{ __('Add') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
