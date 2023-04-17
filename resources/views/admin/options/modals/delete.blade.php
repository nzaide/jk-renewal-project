<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                {{ __('Are you sure you want to delete?') }}
            </div>
            <div class="modal-footer">
                <form action="" method="DELETE" id="deleteForm">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="button" class="btn btn-sm btn-danger" @click="submitForm('delete')">{{ __('Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
