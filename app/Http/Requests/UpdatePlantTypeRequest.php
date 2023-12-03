<?php

namespace App\Http\Requests;

use App\Models\PlantType;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdatePlantTypeRequest
 */
class UpdatePlantTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = PlantType::$rules;
        $rules['name'] = 'required|unique:plant_types,name,' . $this->route('plantType');

        return $rules;
    }
}
