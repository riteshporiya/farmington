<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('messages.common.name').':') !!}<span class="text-danger">*</span>
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plant_type_id', __('messages.plant_type.plant_type').':') !!}<span class="text-danger">*</span>
    {{ Form::select('plant_type_id', $plantType, null, ['class' => 'form-control','required', 'id' => 'plantTypeId', 'placeholder'=>'Select Plant Type']) }}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plant_use_id', __('messages.plant_use.plant_use').':') !!}<span class="text-danger">*</span>
    {{ Form::select('plant_use_id', $plantUse, null, ['class' => 'form-control','required', 'id' => 'plantUseId', 'placeholder'=>'Select Plant Use']) }}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('size', __('messages.plant.size').':') !!}
    {{ Form::select('size',  \App\Models\Plant::SIZE, null, ['class' => 'form-control', 'id' => 'plantSizeId', 'placeholder'=>'Select Size']) }}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('water_requirement', __('messages.plant.water_requirement').':') !!}
    {{ Form::select('water_requirement',  \App\Models\Plant::WATER_REQUIREMENT, null, ['class' => 'form-control', 'id' => 'waterRequirementId', 'placeholder'=>'Select Water Requirement']) }}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('color', __('messages.plant.color').':') !!}
    {!! Form::text('color', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {{ Form::label('description', __('messages.scheme.description').':') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'descriptionId', 'rows' => '5']) }}
</div>

<div class="form-group col-sm-12">
    {{ Form::label('plant_specification', __('messages.plant.plant_specification').':') }}
    {{ Form::textarea('plant_specification', null, ['class' => 'form-control', 'id' => 'plantSpecificationId', 'rows' => '5']) }}
</div>

<div class="form-group col-sm-12">
    {{ Form::label('plant_care', __('messages.plant.plant_care').':') }}
    {{ Form::textarea('plant_care', null, ['class' => 'form-control', 'id' => 'plantCareId', 'rows' => '5']) }}
</div>
<div class="rpw">
    <span id="validationErrorsBox" class="text-danger d-none"></span>
    <div class="form-group col-sm-6 d-flex">
        <div class="col-sm-4 col-md-6 pl-0 form-group">
            <label>{{ __('messages.common.image') }}:</label>
            <br>
            <label class="image__file-upload btn btn-primary text-white" tabindex="2"> {{ __('messages.common.choose') }}
                <input type="file" name="image" id="plantImage" class="d-none">
            </label>
        </div>
        <div class="col-sm-3 preview-image-video-container float-right mt-1">
            <img id='previewImage' class="img-thumbnail user-img user-profile-img profilePicture"
                 src="{{ !empty($plant->image_url) ? $plant->image_url : asset('assets/images/default_image.jpg') }}"/>
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('plants.index') }}" class="btn btn-light">{{ __('messages.common.cancel') }}</a>
</div>
