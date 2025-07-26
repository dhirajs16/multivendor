<?php

namespace App\Http\Requests\Frontend\VendorVerification;

use Illuminate\Foundation\Http\FormRequest;

class VendorVerificationStoreRequest extends FormRequest
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
            'id_verification' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'pan_verification' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'irc_verification' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        ];
    }
}
