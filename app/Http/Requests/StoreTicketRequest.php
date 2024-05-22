<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTicketRequest extends FormRequest
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
            'titolo' => ['required', 'string', 'max:100'],
            'descrizione' => ['nullable'],
            'stato' => ['required', Rule::in(["ASSEGNATO", "IN LAVORAZIONE", "CHIUSO"])],
            'operator_id' => ['required', 'exists:operators,id'],
            'categoria' => ['required']
        ];
    }
}
