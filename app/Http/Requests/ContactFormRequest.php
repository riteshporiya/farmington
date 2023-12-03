<?php

namespace App\Http\Requests;

use App\Models\Inquiry;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ContactFormRequest
 */
class ContactFormRequest extends FormRequest
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
        return Inquiry::$rules;
    }
}
