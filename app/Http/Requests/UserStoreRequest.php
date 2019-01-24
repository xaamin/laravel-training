<?php
namespace App\Http\Requests;

use App\Rules\PasswordValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'string', 'min:3'
            ],
            'email' => [
                'required', 'string', 'email', 'unique:users,email'
            ],
            'password' => [
                'required', 'string', 'min:8', new PasswordValidationRule
            ],
            'address' => [
                'required', 'string', 'min:10'
            ]
        ];
    }
}
