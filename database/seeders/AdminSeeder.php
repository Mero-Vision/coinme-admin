<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin1data = [
            'name' => 'Admin One',
            'email' => 'will4u2love@gmail.com',
            'gender'=>'Male',
            'password' => Hash::make('Password'),
            'address' => 'US',
            'mobile_no' => '+5654475',
            'email_verified_at' => Carbon::now(),
            'status'=>'super-admin',

        ];

        $user1 = User::firstOrCreate(['email' => $admin1data['email']], $admin1data);

        $admin2data = [
            'name' => 'Admin Two',
            'email' => 'birukhadkachetri@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Password'),
            'address' => 'US',
            'mobile_no' => '+5654465',
            'email_verified_at' => Carbon::now(),
            'status' => 'admin',

        ];

        $user2 = User::firstOrCreate(['email' => $admin2data['email']], $admin2data);

        $admin3data = [
            'name' => 'Admin Three',
            'email' => 'tetherxchange@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Password'),
            'address' => 'US',
            'mobile_no' => '+5654465',
            'email_verified_at' => Carbon::now(),
            'status' => 'admin',

        ];

        $user3 = User::firstOrCreate(['email' => $admin3data['email']], $admin3data);


        $admin4data = [
            'name' => 'Coin Luminex',
            'email' => 'dexto123456@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Password'),
            'address' => 'US',
            'mobile_no' => '+5654465',
            'email_verified_at' => Carbon::now(),
            'status' => 'admin',

        ];

        $user4 = User::firstOrCreate(['email' => $admin4data['email']], $admin4data);

        $admin5data = [
            'name' => 'Coin Luminex',
            'email' => 'baileybrooke624@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('Password'),
            'address' => 'US',
            'mobile_no' => '+5654465',
            'email_verified_at' => Carbon::now(),
            'status' => 'admin',

        ];

        $user5 = User::firstOrCreate(['email' => $admin5data['email']], $admin5data);

    }
}