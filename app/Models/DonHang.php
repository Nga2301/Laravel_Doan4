<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
class DonHang extends Model
{
    use HasFactory;
    protected $guarded=[''];
    protected $table='donhang';
    public function ctdonhang(){
        return $this->hasMany(ChiTietDonHang::class,'donhang_id');
    }
  
    const STATUS_DEFAULT=1;
    const STATUS_SUCCESS1=2;
    const STATUS_SUCCESS2=3;
    const STATUS_CANCEL=-1;
    public $status=[
        self::STATUS_DEFAULT =>[
            'name'=>'Đang xử lí',
            'class'=>'label label-default'
        ],
        self::STATUS_SUCCESS1 =>[
            'name'=>'Đang giao hàng',
            'class'=>'label label-info'
        ],
        self::STATUS_SUCCESS2 =>[
            'name'=>'Đã giao hàng',
            'class'=>'label label-success'
        ],
        self::STATUS_CANCEL =>[
            'name'=>'Hủy bỏ',
            'class'=>'label label-danger'
        ],

    ];

    public function getStatus(){
        return Arr::get($this->status,$this->trangthai,[]);
    }
   
}
