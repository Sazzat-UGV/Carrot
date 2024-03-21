<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
           'currency'=>'nullable|string',
           'phone_one'=>'nullable|string|max:15',
           'phone_two'=>'nullable|string|max:15',
           'main_email'=>'nullable|email|max:255',
           'support_email'=>'nullable|email|max:255',
           'address'=>'nullable|string|max:2000',
           'facebook'=>'nullable|string',
           'twitter'=>'nullable|string',
           'instagram'=>'nullable|string',
           'linkedin'=>'nullable|string',
           'youtube'=>'nullable|string',
        ];
    }
}

