<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LetterRequest extends FormRequest
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

    public function messages(): array
    {
        return [
            'name.required'                     => 'The :attribute field is required!',
            'subject.required'                  => 'The :attribute field is required!',
            'email.required'                    => 'The :attribute must use a valid email address',
            'message.required'                  => 'The :attribute field is required!',
            'g-recaptcha-response.required'     => 'Please complete captcha',
            'g-recaptcha-response.recaptcha'    => 'Please verify that you are not a robot',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                  => 'required|string|max:255',
            'subject'               => 'required|string|max:255',
            'email'                 => 'required|email|max:255',
            'message'               => 'required|string|max:1000',
            'g-recaptcha-response'  => 'required|recaptcha'
        ];
    }
}
