<div class="modal fade" tabindex="-1" role="dialog" id="showModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.plant_type.plant_type_details') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['id' => 'showForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="showValidationErrorsBox"></div>
                {{ Form::hidden('plantTypeId',null,['id'=>'plantTypeId']) }}
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('name', __('messages.common.name').':') }}
                        <span id="showName"></span>
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('description',__('messages.scheme.description').':') }}<br>
                        <span id="showDescription"></span>
                    </div>
                </div>
                <div class="text-right mt-2 pt-2">
                    <button type="button" id="btnShowCancel" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
