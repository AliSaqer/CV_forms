<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $rule = 'required |image |mimes:png,jpg';

        if ($this->method() == 'PUT') {
            $rule = 'nullable|image |mimes:png,jpg';
        }
        return [
            'title' => 'required|min:4',
            'email' => 'required|email',
            'image' => $rule,
            'body' => 'required'
        ];
    }
}
