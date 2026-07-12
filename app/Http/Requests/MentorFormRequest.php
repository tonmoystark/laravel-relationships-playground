<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MentorFormRequest extends FormRequest
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
            //
            'name' => 'required | min:3 | max:20',
            'email' => 'required | email | unique:mentors',
            'phone' => 'required | min:9 | max:15',
            'job_title' => 'required | min:3 | max:50',
            'image' => 'max:3048 | image | mimes:jpg,jpeg,png,webp',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter the mentor name.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already in use.',
            'phone.required' => 'Phone number is required.',
            'job_title.required' => 'Job title is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Only JPG, JPEG, PNG and WEBP images are allowed.',
            'image.max' => 'The image size must not exceed 3 MB.',
        ];
    }
}
