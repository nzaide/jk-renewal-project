<div class="modal fade" id="upsertModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="upsertModalTitle"></h5>
            </div>
            <form action="" method="" id="upsertForm">
                <input name="is_sub" id="is_sub" class="input" type="hidden" value=""/>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Name') }} <i class="text-danger">*</i></label>
                        <input name="name" type="text" class="form-control input" id="name">
                        <div class="text-danger mt-1 validation-msg" data-name="name">
                        </div>
                    </div>
                    <div class="form-group" id="parentSelect">
                        <label class="form-control-label">{{ __('Parent Category') }} <i class="text-danger">*</i></label>
                        <select name="parent_id" class="form-control input">
                            <option value=""></option>
                            @foreach ($industries as $industry)
                            <option value="{{ $industry->id }}" class="parent-option" data-type="industries" hidden>
                                {{ $industry->name }}
                            </option>
                            @endforeach
                            @foreach ($jobFields as $jobField)
                            <option value="{{ $jobField->id }}" class="parent-option" data-type="job_fields" hidden>
                                {{ $jobField->name }}
                            </option>
                            @endforeach
                        </select>
                        <div class="text-danger mt-1 validation-msg" data-name="parent_id">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="button" class="btn btn-sm btn-primary" @click="submitForm('upsert')">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
