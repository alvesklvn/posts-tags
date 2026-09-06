<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
        if ($_SERVER["REQUEST_METHOD"] === "PUT"){
            return [
                'title' => 'required|string|min:2|max:40',
                'content' => 'required|string|min:10|max:255',
                'tags' => 'required|array|min:1|max:10',
                'tags.*' => 'integer|exists:tags,id'
            ];
        }
        
        return [
            'title' => 'sometimes|required_without_all:content,tags|string|min:2|max:40',
            'content' => 'sometimes|required_without_all:title,tags|string|min:10|max:255',
            'tags' => 'sometimes|required_without_all:title,content|array|min:1|max:10',
            'tags.*' => 'integer|exists:tags,id'
        ];
    }
}
