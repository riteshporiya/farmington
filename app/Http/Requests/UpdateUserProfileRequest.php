<?php

namespace App\Http\Requests;

use App\Models\User;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateUserProfileRequest
 */
class UpdateUserProfileRequest extends FormRequest
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
     * @return array The given data was invalid.
     */
    public function rules(): array
    {
        $id = Auth::user()->id;

        return [
            'first_name' => 'required',
            'last_name'  => 'nullable',
            'email'      => 'required|email|unique:users,email,'.$id.'|regex:/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/',
            'mobile'      => 'nullable|min:10|max:10',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return User::$messages;
    }
}
