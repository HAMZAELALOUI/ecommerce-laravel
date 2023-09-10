<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorShopProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'vendor1@gmail.com')->first();
        $vendor = new Vendor();
        $vendor->banner = 'uploads/123.jpg';
        $vendor->shop_name = 'Vendor Shop';
        $vendor->phone = '0625584855';
        $vendor->email = 'vendor1@gmail.com';
        $vendor->adress = 'Morocco';
        $vendor->description = 'description';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
