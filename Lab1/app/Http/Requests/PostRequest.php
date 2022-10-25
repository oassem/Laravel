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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|unique:posts,title,' . $this->post,
            'description' => 'required|min:10',
            'poster' => 'required|exists:users,id',
            'image' => 'image|mimes:png,jpg|max:2048'
        ];
    }
}
