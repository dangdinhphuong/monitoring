<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ConfigCreateRequest extends FormRequest
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
            'key' => 'required|string|unique:config',
            'group' => 'required|string',
            'title' => 'required|string',
            'type' => 'required|string|in:text,number,date,file',
            'value' => $this->getValueRules($this->input('type')),
        ];
    }
    private function getValueRules($type)
    {
        if ($type == 'text') {
            return 'string|max:250';
        } elseif ($type == 'number') {
            return 'numeric';
        } elseif ($type == 'date') {
            return 'date';
        } elseif ($type == 'file') {
            return 'required|file|mimes:jpg,jpeg,png,csv,xlsx,xls|max:2048';
        }

        return '';
    }
    public function messages()
    {
        return [
            'key.required' => 'Trường key là bắt buộc.',
            'key.string' => 'Trường key phải là chuỗi.',
            'key.unique' => 'Giá trị của trường key đã tồn tại.',
            'group.required' => 'Trường group là bắt buộc.',
            'group.string' => 'Trường group phải là chuỗi.',
            'title.required' => 'Trường title là bắt buộc.',
            'title.string' => 'Trường title phải là chuỗi.',
            'type.required' => 'Trường type là bắt buộc.',
            'type.string' => 'Trường type phải là chuỗi.',
            'type.in' => 'Giá trị của trường type không hợp lệ.',
            'value' => 'Thông tin value không hợp lệ.',
        ];
    }
}
