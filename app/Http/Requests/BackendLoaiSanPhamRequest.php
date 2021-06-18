<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendLoaiSanPhamRequest extends FormRequest
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
            'tenloai'=>'required|unique:loaisanpham,tenloai,'.$this->id,
            'mota'=>'required',

        ];
    }

    public function messages()
    {
        return [
            'tenloai.required'=>'Dữ liệu không được để trống',
            'tenloai.unique'=>'Dữ liệu đã tồn tại',
            'mota.required'=>'Dữ liệu không được để trống',

        ];
    }
}