<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'countryCode' => ['required', 'string'],
            'number' => ['required'],
            'theme_id' => ['required'],
            'highcolors_id' => ['required'],
            'mediumcolors_id' => ['required'],
            'lowcolors_id' => ['required'],
            'image' => ['image'],
            'coverImage' => ['image'],
        ];
    }
}
