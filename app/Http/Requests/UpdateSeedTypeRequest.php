<?php

namespace App\Http\Requests;

use App\Models\SeedType;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateSeedTypeRequest
 */
class UpdateSeedTypeRequest extends FormRequest
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
        $rules = SeedType::$rules;
        $rules['name'] = 'required|unique:seed_types,name,' . $this->route('seedType');

        return $rules;
    }
}
