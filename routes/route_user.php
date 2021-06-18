<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'User','prefix' => 'user','middleware' => 'CheckLoginUser'], function () {
    Route::get('','UserController@index')->name('get_user.home');//Trang chủ
    //Route::get('thong_tin_ca_nhan','UserController@index')->name('get_user.thong_tin_ca_nhan.index');
    Route::post('','UserController@update');
    
  //  Route::get('don_hang','OrderController@index')->name('get_user.don_hang.index');
    Route::get('view/{id}','UserController@view')->name('get_user.don_hang.view');
    Route::get('success/{id}','UserController@success')->name('get_user.don_hang.success');
    Route::get('cancel/{id}','UserController@cancel')->name('get_user.don_hang.cancel');
    Route::get('delete/{id}','UserController@delete')->name('get_user.don_hang.delete');
});
 ?>