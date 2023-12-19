<?php

namespace App\Http\Requests\CryptoCurrency;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCryptoCurrencyRequest extends FormRequest
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
            'name'=>['required',Rule::unique('crypto_currencies','name')],
            'symbol'=>['required', Rule::unique('crypto_currencies', 'symbol')],
            'price'=>['required','numeric'],
            'market_capital'=>['required','numeric']
        ];
    }
}