<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            "web_site_name" => ['required', 'string'],
            "web_site_email",  ['required', 'email'],
            "web_site_phone",  ['required', 'string'],
            "web_site_address",['required', 'string'],
            "web_site_logo",  ['image', 'nullable', 'mimes:jpeg,jpg,png', 'max:2048'],
            "about_web_site",  ['string', 'required'],
        ];
    }
}
