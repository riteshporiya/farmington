<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.garden_types.edit_garden_type') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['id' => 'editForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('gardenTypeId',null,['id'=>'gardenTypeId']) }}
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('name', __('messages.common.name').':') }}<span
                                class="text-danger">*</span>
                        {{ Form::text('name', null, ['class' => 'form-control' , 'id' => 'editName']) }}
                    </div>
                </div>
                <div class="rpw">
                    <span id="validationErrorsBox" class="text-danger d-none"></span>
                    <div class="form-group col-sm-6 d-flex">
                        <div class="col-sm-4 col-md-6 pl-0 form-group">
                            <label>{{ __('messages.common.image') }}:</label>
                            <br>
                            <label class="image__file-upload btn btn-primary text-white" tabindex="2"> {{ __('messages.common.choose') }}
                                <input type="file" name="image" id="editGardenTypeImage" class="d-none">
                            </label>
                        </div>
                        <div class="col-sm-3 preview-image-video-container float-right mt-1">
                            <img id='editPreviewImage' style="height: 100px; width: 100px; object-fit: contain;"
                                 src=""/>
                        </div>
                    </div>
                </div>
                <div class="text-right mt-2 pt-2">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnEditCancel" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
