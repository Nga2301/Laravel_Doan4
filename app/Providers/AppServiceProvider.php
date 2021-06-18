<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\LoaiSanPham;
use App\Models\Admin;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try{
            $loaisanphamGlobal =  LoaiSanPham::all();
            $admin=Admin::find(get_data_user('admins'));
        $sanphamcart = \Cart::content();
        }
        catch(\Exception $exception)
        {

        }
        \View::share('loaisanphamGlobal',$loaisanphamGlobal ?? []);
        \View::share('sanphamcart',$sanphamcart);
        \View::share('admin',$admin);
       // dd($admin);
        Paginator::useBootstrap();
    }
}