<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChannelRequest extends FormRequest
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
            'name' => ['required'],
            'model' => ['required','unique:channel'],

        ];
    }
    public function  messages()
    {
        return [
            'name.required' => 'Vui lòng nhập dữ liệu name',
            'model.required' => 'Vui lòng nhập dữ liệu model',
            'model.unique' => 'Dữ liệu đã tồn tại',
        ];
    }

}
