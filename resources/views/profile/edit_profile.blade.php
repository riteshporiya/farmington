<div id="editProfileModal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content left-margin">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.admin_dashboard.edit_profile') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editProfileForm','files'=>true]) }}
            <div class="modal-body">
                {{ Form::hidden('user_id',null,['id'=>'editUserId']) }}
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('first_name', __('messages.user.first_name').':') }}<span class="text-danger">*</span>
                        {{ Form::text('first_name', null, ['id'=>'firstName','class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('last_name', __('messages.user.last_name').':') }}
                        {{ Form::text('last_name', null, ['id'=>'lastName','class' => 'form-control']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('email', __('messages.user.email').':') }}<span class="text-danger">*</span>
                        {{ Form::email('email', null, ['id'=>'userEmail','class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('phone', __('messages.user.mobile').':') }}
                        {{ Form::text('mobile', null, ['id'=>'phone','class' => 'form-control', 'minlength' => '10', 'maxlength' => '10', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
                    </div>
                </div>
                {{--                <div class="row">--}}
                {{--                    <div class="col-4 col-sm-4 col-xl-3">--}}
                {{--                        <span id="profilePictureValidationErrorsBox" class="text-danger d-none"></span>--}}
                {{--                        <div class="form-group">--}}
                {{--                            {{ Form::label('profile_picture', 'Profile :') }}--}}
                {{--                            <label class="image__file-upload text-white"> Choose--}}
                {{--                                {{ Form::file('image',['id'=>'profilePicture','class' => 'd-none']) }}--}}
                {{--                            </label>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="col-3">--}}
                {{--                        <img id='profilePicturePreview' class="img-thumbnail thumbnail-preview"--}}
                {{--                             src="{{ asset('assets/img/infyom-logo.png') }}">--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                
                <div class="rpw">
                    <span id="profilePictureValidationErrorsBox" class="text-danger d-none"></span>
                    <div class="form-group col-sm-6 d-flex">
                        <div class="col-sm-4 col-md-6 pl-0 form-group">
                            <label>{{ __('messages.common.image') }}:</label>
                            <br>
                            <label class="image__file-upload btn btn-primary text-white" tabindex="2"> {{ __('messages.common.choose') }}
                                <input type="file" name="image" id="profilePicture" class="d-none">
                            </label>
                        </div>
                        <div class="col-sm-3 preview-image-video-container float-right mt-1">
                            <img id='profilePicturePreview'
                                 class="img-thumbnail user-img user-profile-img profilePicture"
                                 src="{{asset('assets/images/default_image.jpg')}}"/>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnPrEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light left-margin"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

<div id="changeLanguageModal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content left-margin">
            <div class="modal-header">
                <h5 class="modal-title">Change Language</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'changeLanguageForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editProfileValidationErrorsBox"></div>
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-12">
                        {{ Form::label('language','Change Language:') }}<span
                                class="required">*</span>
                        {{ Form::select('language', getUserLanguages(), getLoggedInUser()->language, ['id'=>'language','class' => 'form-control','required']) }}
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button('Save', ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnLanguageChange','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light left-margin" data-dismiss="modal"
                            onclick="document.getElementById('language').value = '{{getLoggedInUser()->language}}'">
                        Cancel
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@push('scripts')
    <script>
        let language = "{{ getLoggedInUser()->language }}";
    </script>
