<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendTinTucRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'tieude'=>'required|unique:tintuc,tieude,'.$this->id,
            'noidung'=>'required',
            'hinhanh'=>'required',
            'theloai'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'tieude.required'=>'Dữ liệu không được để trống',
            'tieude.unique'=>'Dữ liệu đã tồn tại',
            'noidung.required'=>'Dữ liệu không được để trống',
            'hinhanh.required'=>'Dữ liệu không được để trống',
            'theloai.required'=>'Dữ liệu không được để trống',
        ];
    }
}