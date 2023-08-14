<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@gmail.com')->first();
        $vendor = new Vendor();
        $vendor->banner = 'uploads/123.jpg';
        $vendor->phone = '0625584855';
        $vendor->email = 'admin@gmail.com';
        $vendor->adress = 'Morocco';
        $vendor->description = 'description';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
