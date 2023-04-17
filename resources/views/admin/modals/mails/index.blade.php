<div class="modal fade" id="mail-list-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ __('Sent Emails') }}
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('ID') }}</th>
                            <th scope="col">{{ __('Subject') }}</th>
                            <th scope="col">{{ __('Date Sent') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="loader">
                            <td colspan="3" class="text-center">
                                <span class="fa fa-spinner fa-spin"></span>
                                {{ __('Loading') }} ...
                            </td>
                        </tr>
                    </tbody>
                </table>

                <nav>
                    <ul class="justify-content-center pagination"></ul>
                </nav>
            </div>
        </div>
    </div>
</div>

@push('scripts')
@vite('resources/js/admin/modals/mails/index.js')
@endpush