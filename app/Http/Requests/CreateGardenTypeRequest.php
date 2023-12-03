<?php

namespace App\Http\Requests;

use App\Models\GardenTypes;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateGardenTypeRequest
 */
class CreateGardenTypeRequest extends FormRequest
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
        return GardenTypes::$rules;
    }
}
