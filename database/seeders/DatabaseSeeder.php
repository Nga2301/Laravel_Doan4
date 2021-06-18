<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            'name'=>'Quan Tri Vien',
            'email'=>'duongthuyngo2k@gmail.com',
            'password'=>bcrypt(00000000),
            'phone'=>'0355748990',
            'address'=>'Ha Noi',
            'created_at'=>Carbon::now(),
            
        ]);
        // \App\Models\User::factory(10)->create();
    }
}