<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateToDosRequest extends FormRequest
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
            'name' => 'required',
            'date' => 'required|after:yesterday',
            'end_time' => 'required',
            'date_reminder' => 'required|after:yesterday',
            'time_reminder' => 'required',
            'priorities_id' => 'required',
            'categories_id' => 'required',
        ];
    }


    public function messages()
    {

        return [
            'name.required' => 'Please, fill in the title of the ToDo.',
            'date.required' => 'Please, fill in the date.',
            'date_reminder.required' => 'Please, fill in the date for the reminder.',
            'date.after' => 'You cant select a date in the past!',
            'date_reminder.after' => 'You cant select a date in the past!',
            'end_time.required' => 'Please, fill in the end time.',
            'time_reminder.required' => 'Please, fill in the end time for the reminder.',
            'categories_id' => 'Please, select a category.',
            'priorities_id' => 'Please, select a priority.',
        ];

    }
}
