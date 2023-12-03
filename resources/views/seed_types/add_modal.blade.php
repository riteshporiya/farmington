<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="testimonialsHeaders">{{ __('messages.seed_types.new_seed_type') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'addNewForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('name',__('messages.common.name').':') }}<span
                                class="text-danger">*</span>
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="rpw">
                    <span id="validationErrorsBox" class="text-danger d-none"></span>
                    <div class="form-group col-sm-6 d-flex">
                        <div class="col-sm-4 col-md-6 pl-0 form-group">
                            <label>{{ __('messages.common.image') }}:</label>
                            <br>
                            <label class="image__file-upload btn btn-primary text-white" tabindex="2"> {{ __('messages.common.choose') }}
                                <input type="file" name="image" id="seedTypeImage" class="d-none">
                            </label>
                        </div>
                        <div class="col-sm-3 preview-image-video-container float-right mt-1">
                            <img id='previewImage' style="height: 100px; width: 100px; object-fit: contain;"
                                 src="{{ asset('assets/images/default_image.jpg') }}"/>
                        </div>
                    </div>
                </div>
                <div class="text-right mt-2 pt-2">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnCancel" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
