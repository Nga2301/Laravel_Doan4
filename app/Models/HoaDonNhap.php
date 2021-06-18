<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonNhap extends Model
{
    use HasFactory;
    protected $guarded=[''];
    protected $table='hoadonnhap';
    public function nhacungcap(){
        return $this->belongsTo(NhaCungCap::class,'nhacungcap_id');
    }
    public function nhanvien(){
        return $this->belongsTo(NhanVien::class,'nhanvienid');
    }
}