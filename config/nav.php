<?php
return [
    'admin' => [
        'top' => [
            [
                'name' => 'Loại sản phẩm',
                'route' => 'get_backend.loai_san_pham.index'
            ],
            [
                'name' => 'Sản phẩm',
                'route' => 'get_backend.san_pham.index'
            ],
            [
                'name' => 'Giá bán',
                'route' => 'get_backend.gia_ban.index'
            ],
            [
                'name' => 'Tin tức',
                'route' => 'get_backend.tin_tuc.index'
            ],
            [
                'name' => 'Nhà cung cấp',
                'route' => 'get_backend.nha_cung_cap.index'
            ],

            [
                'name' => 'Đơn hàng',
               
            ],
           
        ],
        'bottom' => [
            [
               'name' => 'Tất cả đơn hàng',
               'route' => 'get_backend.don_hang.index'
           ],
           [
               'name' => 'Đơn hàng đang xử lí',
               'route' => 'get_backend.don_hang.index1'
           ],
           [
               'name' => 'Đơn hàng đang giao',
               'route' => 'get_backend.don_hang.index2'
           ],
           [
               'name' => 'Đơn hàng đã giao',
               'route' => 'get_backend.don_hang.index3'
           ],
           [
               'name' => 'Đơn hàng bị hủy',
               'route' => 'get_backend.don_hang.index4'
           ],
           
         
       ],
    ],
    'home' => [
        'top' => [
            [
                'name' => 'Bài viết',
                'route' => 'get.bai_viet'
            ],
            [
                'name' => 'Chính sách',
                'route' => 'get.chinh_sach'
            ],

            [
                'name' => 'Về chúng tôi',
                'route' => 'get.ve_chung_toi'
            ],
            [
                'name' => 'Liên hệ',
                'route' => 'get.lien_he'
            ],

        ]
    ],
    'users' => [
        'top' => [
           
            [
                'name'    => 'Thông tin cá nhân',
                'route'   => 'get_user.thong_tin_ca_nhan.index',
                'icon'    => 'fas fa-shopping-cart',
                'class'   => '',
                'param'   => true,
            ],
            [
                'name'    => 'Đơn hàng',
                'route'   => 'get_user.don_hang.index',
                'icon'    => 'fas fa-shopping-cart',
                'class'   => '',
                
            ],


        ]
    ],


];