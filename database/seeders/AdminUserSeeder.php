<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Class AdminUserSeeder
 */
class AdminUserSeeder extends Seeder
{
   public function run()
   {
       $input = [
         'first_name' => 'Super',
         'last_name' => 'Admin',
         'mobile' => '9856325698',
         'email' => 'admin@farmington.com',
         'password' => Hash::make('123456789'),
         'user_type' => User::ADMIN,
         'email_verified_at' => Carbon::now()
       ];
       
       User::create($input);
   }
}
