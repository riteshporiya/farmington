<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateUserRequest
 */
class UpdateUserRequest extends FormRequest
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
        $rules = User::$rules;
        $rules['email'] = 'required|email:filter|unique:users,email,'.$this->route('user');
        $rules['password'] = 'nullable|same:confirm_password|min:8';

        return $rules;
    }
}
