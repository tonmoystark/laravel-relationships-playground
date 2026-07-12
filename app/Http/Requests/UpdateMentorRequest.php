<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMentorRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required | min:3 | max:20',
            'email' => 'required | email',
            'phone' => 'required | min:9 | max:15',
            'job_title' => 'required | min:3 | max:50',
            'image' => 'max:3048 | image | mimes:jpg,jpeg,png,webp',
        ];
    }
}
