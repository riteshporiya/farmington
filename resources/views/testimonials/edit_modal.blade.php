<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Testimonial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['id' => 'editForm', 'files' => true]) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('testimonialId',null,['id'=>'testimonialId']) }}
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('name', 'Name:') }}<span
                                class="text-danger">*</span>
                        {{ Form::text('name', null, ['class' => 'form-control' , 'id' => 'editName']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('company', 'Company:') }}<span
                                class="text-danger">*</span>
                        {{ Form::text('company', null, ['class' => 'form-control' , 'id' => 'editCompany']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('designation', 'Designation:') }}<span
                                class="text-danger">*</span>
                        {{ Form::text('designation', null, ['class' => 'form-control' , 'id' => 'editDesignation']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        <span id="validationErrorsBox" class="text-danger d-none"></span>
                        <div class="form-group col-sm-6 d-flex">
                            <div class="col-sm-4 col-md-6 pl-0 form-group">
                                <label>Image:</label>
                                <br>
                                <label class="image__file-upload btn btn-primary text-white" tabindex="2"> Choose
                                    <input type="file" name="image" id="editTestimonialImage" class="d-none">
                                </label>
                            </div>
                            <div class="col-6 col-xl-6 pl-0 mt-1">
                                <img id='editPreviewImage'
                                     class="img-thumbnail user-img user-profile-img profilePicture"
                                     src="{{ asset('assets/images/default_image.jpg') }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('description','Description:') }}<span
                                class="text-danger">*</span>
                        {{ Form::text('description', null, ['class' => 'form-control', 'id' => 'editDescription']) }}
                    </div>
                </div>
                <div class="text-right mt-2 pt-2">
                    {{ Form::button('Save', ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnEditCancel" class="btn btn-light ml-1"
                            data-dismiss="modal">Cancel
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
