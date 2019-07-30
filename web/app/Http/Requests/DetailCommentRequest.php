<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailCommentRequest extends FormRequest
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
            'star' => 'required',
            'reviewtitle' => 'required|max:20',
            'reviewtext' => 'required|max:350',
        ];
    }

    public function messages()
    {
        return [
            'star.required' => '星の入力は必須です',
            'reviewtitle.required' => 'レビュータイトルは必須です',
            'reviewtitle.max' => 'レビュータイトルは20文字以内で入力をお願い致します',
            'reviewtext.required' => 'レビューテキストは必須です',
            'reviewtext.max' => 'レビューテキストは350字以内で入力をお願い致します'
        ];
    }
}
