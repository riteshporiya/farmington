<?php

namespace App\Http\Requests;

use App\Models\GardenTypes;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateGardenTypeRequest
 */
class UpdateGardenTypeRequest extends FormRequest
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
        $rules = GardenTypes::$rules;
        $rules['name'] = 'required|unique:garden_types,name,' . $this->route('gardenType');

        return $rules;
    }
}
