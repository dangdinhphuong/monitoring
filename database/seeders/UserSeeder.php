<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1, 1) as $index){
            User::create([
                'avatar'=>"https://webmaudep.com/demo/thucpham/tp01/images/product-5.jpg",
                'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
                'email'=>"admin@gmail.com",
                'fullname'=>"Đặng Đình Phương",
                'address'=> "238 au cơ",
                'phone' => "0976594507",
                'status' => 1,
            ]);
        }

    }
}
