<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', __('messages.user.first_name').':') !!}<span class="text-danger">*</span>
    {!! Form::text('first_name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', __('messages.user.last_name').':') !!}<span class="text-danger">*</span>
    {!! Form::text('last_name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('messages.user.email').':') !!}<span class="text-danger">*</span>
    {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', __('messages.user.mobile').':') !!}<span class="text-danger">*</span>
    {!! Form::text('mobile', null, ['class' => 'form-control', 'required']) !!}
</div>

@if(!$isEdit)
<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', __('messages.user.password').':') !!}<span class="text-danger">*</span>
    <input type="password" class="form-control" required name="password" maxlength="255">
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('confirm_password', __('messages.user.change_password').':') !!}<span class="text-danger">*</span>
    <input type="password" class="form-control" required name="confirm_password" maxlength="255">
</div>
@endif
{{--{{ dd($user) }}--}}
<div class="rpw">
    <span id="validationErrorsBox" class="text-danger d-none"></span>
    <div class="form-group col-sm-6 d-flex">
        <div class="col-sm-4 col-md-6 pl-0 form-group">
            <label>{{ __('messages.common.image') }}:</label>
            <br>
            <label class="image__file-upload btn btn-primary text-white" tabindex="2"> {{ __('messages.common.choose') }}
                <input type="file" name="image" id="userImage" class="d-none">
            </label>
        </div>
        <div class="col-sm-3 preview-image-video-container float-right mt-1">
            <img id='previewImage' class="img-thumbnail user-img user-profile-img profilePicture"
                 src="{{ !empty($user->image_url) ? $user->image_url : asset('assets/images/default_image.jpg') }}"/>
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-light">{{ __('messages.common.cancel') }}</a>
</div>

