<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('messages.common.name').':') !!}<span class="text-danger">*</span>
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seed_type_id', __('messages.seed_types.seed_type').':') !!}<span class="text-danger">*</span>
    {{ Form::select('seed_type_id', $seedType, null, ['class' => 'form-control','required', 'id' => 'seedTypeId', 'placeholder'=>'Select Seed Type']) }}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('water_requirement', __('messages.plant.water_requirement').':') !!}
    {{ Form::select('water_requirement',  \App\Models\Seed::WATER_REQUIREMENT, null, ['class' => 'form-control', 'id' => 'waterRequirementId', 'placeholder'=>'Select Water Requirement']) }}
</div>

<div class="form-group col-sm-12">
    {{ Form::label('description', __('messages.scheme.description').':') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'descriptionId', 'rows' => '5']) }}
</div>

<div class="form-group col-sm-12">
    {{ Form::label('seed_specification', __('messages.seed.seed_specification').':') }}
    {{ Form::textarea('seed_specification', null, ['class' => 'form-control', 'id' => 'seedSpecificationId', 'rows' => '5']) }}
</div>

<div class="form-group col-sm-12">
    {{ Form::label('seed_care', __('messages.seed.seed_care').':') }}
    {{ Form::textarea('seed_care', null, ['class' => 'form-control', 'id' => 'seedCareId', 'rows' => '5']) }}
</div>
<div class="rpw">
    <span id="validationErrorsBox" class="text-danger d-none"></span>
    <div class="form-group col-sm-6 d-flex">
        <div class="col-sm-4 col-md-6 pl-0 form-group">
            <label>{{ __('messages.common.image') }}:</label>
            <br>
            <label class="image__file-upload btn btn-primary text-white" tabindex="2">{{ __('messages.common.choose') }}
                <input type="file" name="image" id="seedImage" class="d-none">
            </label>
        </div>
        <div class="col-sm-3 preview-image-video-container float-right mt-1">
            <img id='previewImage' class="img-thumbnail user-img user-profile-img profilePicture"
                 src="{{!empty($seed->image_url) ? $seed->image_url : asset('assets/images/default_image.jpg') }}"/>
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('seeds.index') }}" class="btn btn-light">{{ __('messages.common.cancel') }}</a>
</div>
