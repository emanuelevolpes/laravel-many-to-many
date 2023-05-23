<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:projects|string|max:255',
            'image' => 'nullable|image',
            'description' => 'required|string',
            'development_date' => 'required',
            'project_link' => 'required|unique:projects|url',
            'type_id' => 'nullable|exists:types,id',
            'technology' => 'nullable|exists:technology,id'
        ];
    }
}
