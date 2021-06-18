<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Backend'], function () {
    Route::group(['namespace' => 'Admin'], function () {
        Route::get('admin/dang-nhap','AdminLoginController@getLoginAdmin')->name('get_backend.login');
        Route::post('admin/dang-nhap','AdminLoginController@postLoginAdmin');
        Route::get('logout','AdminLoginController@getLogout')->name('get.logout');

    });
});

Route::group(['namespace' => 'Backend','prefix' => 'admin'], function () {
    Route::get('','BackendHomeController@index')->name('get_backend.home');//Trang chủ


    Route::prefix('loai_san_pham')->group( function () {
        Route::get('','BackendLoaiSanPhamController@index')->name('get_backend.loai_san_pham.index');

        Route::get('create','BackendLoaiSanPhamController@create')->name('get_backend.loai_san_pham.create');
        Route::post('create','BackendLoaiSanPhamController@store');

        Route::get('update/{id}','BackendLoaiSanPhamController@edit')->name('get_backend.loai_san_pham.update');
        Route::post('update/{id}','BackendLoaiSanPhamController@update');

        Route::get('delete/{id}','BackendLoaiSanPhamController@delete')->name('get_backend.loai_san_pham.delete');

  });

  Route::prefix('san_pham')->group( function () {
    Route::get('','BackendSanPhamController@index')->name('get_backend.san_pham.index');

    Route::get('create','BackendSanPhamController@create')->name('get_backend.san_pham.create');
    Route::post('create','BackendSanPhamController@store');

    Route::get('update/{id}','BackendSanPhamController@edit')->name('get_backend.san_pham.update');
    Route::post('update/{id}','BackendSanPhamController@update');

    Route::get('delete/{id}','BackendSanPhamController@delete')->name('get_backend.san_pham.delete');
    Route::post('paging', 'BackendSanPhamController@paging');

});



Route::prefix('gia_ban')->group( function () {
    Route::get('','BackendGiaBanController@index')->name('get_backend.gia_ban.index');

    Route::get('create','BackendGiaBanController@create')->name('get_backend.gia_ban.create');
    Route::post('create','BackendGiaBanController@store');

    Route::get('update/{id}','BackendGiaBanController@edit')->name('get_backend.gia_ban.update');
    Route::post('update/{id}','BackendGiaBanController@update');

    Route::get('delete/{id}','BackendGiaBanController@delete')->name('get_backend.gia_ban.delete');

});

Route::prefix('nha_cung_cap')->group( function () {
    Route::get('','BackendNhaCungCapController@index')->name('get_backend.nha_cung_cap.index');

    Route::get('create','BackendNhaCungCapController@create')->name('get_backend.nha_cung_cap.create');
    Route::post('create','BackendNhaCungCapController@store');

    Route::get('update/{id}','BackendNhaCungCapController@edit')->name('get_backend.nha_cung_cap.update');
    Route::post('update/{id}','BackendNhaCungCapController@update');

    Route::get('delete/{id}','BackendNhaCungCapController@delete')->name('get_backend.nha_cung_cap.delete');

});








Route::prefix('don_hang')->group( function () {
    Route::get('','BackendDonHangController@index')->name('get_backend.don_hang.index');
    Route::get('don-hang-dang-xu-li','BackendDonHangController@index')->name('get_backend.don_hang.index1');
    Route::get('don-hang-dang-giao','BackendDonHangController@index')->name('get_backend.don_hang.index2');
    Route::get('don-hang-da-giao','BackendDonHangController@index')->name('get_backend.don_hang.index3');
    Route::get('don-hang-bi-huy','BackendDonHangController@index')->name('get_backend.don_hang.index4');
    Route::get('view/{id}','BackendDonHangController@view')->name('get_backend.don_hang.view');
    Route::get('success1/{id}','BackendDonHangController@success1')->name('get_backend.don_hang.success1');
    Route::get('success2/{id}','BackendDonHangController@success2')->name('get_backend.don_hang.success2');

    Route::get('cancel/{id}','BackendDonHangController@cancel')->name('get_backend.don_hang.cancel');
  
});


Route::prefix('bai_viet')->group( function () {
    Route::get('','BackendTinTucController@index')->name('get_backend.tin_tuc.index');

    Route::get('create','BackendTinTucController@create')->name('get_backend.tin_tuc.create');
    Route::post('create','BackendTinTucController@store');

    Route::get('update/{id}','BackendTinTucController@edit')->name('get_backend.tin_tuc.update');
    Route::post('update/{id}','BackendTinTucController@update');

    Route::get('delete/{id}','BackendTinTucController@delete')->name('get_backend.tin_tuc.delete');

});
});
 ?>