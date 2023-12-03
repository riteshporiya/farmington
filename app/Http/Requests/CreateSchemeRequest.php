<?php

namespace App\Http\Requests;

use App\Models\Scheme;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateSchemeRequest
 */
class CreateSchemeRequest extends FormRequest
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
        return Scheme::$rules;
    }
}
