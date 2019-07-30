<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path('review')) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reviewstar' => 'required',
            'reviewtitle' => 'required|max:20',
            'reviewtext' => 'required|max:350',
        ];
    }

    public function messages()
    {
        return [
            'reviewstar.required' => '星の入力は必須です',
            'reviewtitle.required' => 'レビュータイトルは20文字以内で必須です',
            'reviewtext.required' => 'レビューテキストは必須です'
        ];
    }
}
