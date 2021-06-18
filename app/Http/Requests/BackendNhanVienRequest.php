<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendNhanVienRequest extends FormRequest
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
            'tennhanvien'=>'required',
            'diachi'=>'required',
            'sodienthoai'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:nhanvien,sodienthoai,'.$this->id,
            'email'=>'required:rfc,dns|regex:/(.+)@(.+)\.(.+)/i|unique:nhanvien,email,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'tennhacungcap.required'=>'Dữ liệu không được để trống',
            'diachi.required'=>'Dữ liệu không được để trống',
            'sodienthoai.required'=>'Dữ liệu không được để trống',
            'sodienthoai.regax'=>'Nhập đúng định dạng số điện thoại',
            'sodienthoai.min'=>'Nhập đủ mười số',
            'sodienthoai.unique'=>'Dữ liệu đã tồn tại',
            'email.required'=>'Dữ liệu không được để trống',
            'email.regex'=>'Email phải nhập đúng định dạng',
            'email.unique'=>'Dữ liệu đã tồn tại',


        ];
    }
}