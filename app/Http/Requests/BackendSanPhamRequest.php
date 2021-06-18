<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendSanPhamRequest extends FormRequest
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
            'tensanpham'=>'required|unique:sanpham,tensanpham,'.$this->id,
            'gia'=>'required',
            'soluong'=>'required',
            'mota'=>'required',
            'size'=>'required',
            'loaisanpham_id'=>'required',
            'hinhanh'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'tensanpham.required'=>'Dữ liệu không được để trống',
            'tensanpham.unique'=>'Dữ liệu đã tồn tại',
            'gia.required'=>'Dữ liệu không được để trống',
            'soluong.required'=>'Dữ liệu không được để trống',
            'loaisanpham_id.required'=>'Dữ liệu không được để trống',
            'mota.required'=>'Dữ liệu không được để trống',
            'hinhanh.required'=>'Hãy chọn ảnh từ máy của bạn'
        ];
    }
}