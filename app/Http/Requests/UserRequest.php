<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        if( ! $user ) return false;
        
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'username'  => [
                'required',
                'string',
                Rule::dimensions()->maxWidth("1000px")->maxHeight("1000px")->message("Height must not be grater than 1000px")
            ],//'required|string|max:255|unique:users,username|regex:/[A-Za-z0-9^!@$]/',
            "email"     => [
                "required",
                Rule::exists("users", "email")
                Rule::requiredIf("users", "=", "whatever")
            ],
            "password"  => 'confirmed|required|string|max:255'
        ];
    }

    /**
     * Rule::unique() checks if an entry is unique within the database
     * Rule::exists("table_name, column_name) checks if a particular entry exists in the database
     * Rule::in([]) checks value is in an array
     * Rule::notin([]) checks value is not in an array
     * Rule::dimensions()validate Image dimension maxWidth, maxHeight, minWidth, minHeight
     * Rule::file() validates file uploads use with mimes,
     * Rule::document() validates file uploads
     * Rule::requiredIf() conditional require
     */

    public function messages(): array
    {
        return [
            'username.required' => "Username is required",
            'username.string'   => "username can only be a string",
            "username.max"      => "Your Username is too long",
            'email.email'       => "Your email is not formmated as an email",
            "email.required"    => "Email is required",
            "username.unique"   => "Username already exist"
        ];
    }
}
