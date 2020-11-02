<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListingRequest extends FormRequest
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
            'title' => 'required|max:36',
            'tags' => 'json|regex:/^(?!.*\s).+$/u'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'リスト名',
            'tags' => 'タグ',
        ];
    }

    // JSON形式の文字列整形
    public function passedValidation()
    {
        $this->tags = collect(json_decode($this->tags))
            ->slice(0, 3)
            ->map(function ($requestTag) {
                return $requestTag->text;
            });
    }
}
