<?php

namespace App\Http\Requests;

use App\Models\PlantUse;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdatePlantUseRequest
 */
class UpdatePlantUseRequest extends FormRequest
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
        $rules = PlantUse::$rules;
        $rules['name'] = 'required|unique:plant_uses,name,' . $this->route('plantUse');

        return $rules;
    }
}
