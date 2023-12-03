<div class="form-group col-sm-12">
    {!! Form::label('title', __('messages.scheme.title').':') !!}<span class="text-danger">*</span>
    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group col-sm-12">
    {{ Form::label('description', __('messages.scheme.description').':') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'descriptionId', 'rows' => '5']) }}
</div>

<div class="rpw">
    <span id="validationErrorsBox" class="text-danger d-none"></span>
    <div class="form-group col-sm-6 d-flex">
        <div class="col-sm-4 col-md-6 pl-0 form-group">
            <label>{{ __('messages.common.image') }}:</label>
            <br>
            <label class="image__file-upload btn btn-primary text-white" tabindex="2"> {{ __('messages.common.choose') }}
                <input type="file" name="image" id="schemeImage" class="d-none">
            </label>
        </div>
        <div class="col-sm-3 preview-image-video-container float-right mt-1">
            <img id='previewImage' class="img-thumbnail user-img user-profile-img profilePicture"
                 src="{{!empty($scheme->image_url) ? $scheme->image_url : asset('assets/images/default_image.jpg') }}"/>
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('scheme.index') }}" class="btn btn-light">{{ __('messages.common.cancel') }}</a>
</div>
