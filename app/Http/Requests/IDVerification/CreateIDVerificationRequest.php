<?php

namespace App\Http\Requests\IDVerification;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateIDVerificationRequest extends FormRequest
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
            'front_image'=>['required','image'],
            'back_image'=>['required','image'],
            'id_in_hand'=>['required','image'],
            'id_number' => ['required', Rule::unique('users', 'id_number')],
        ];
    }
}