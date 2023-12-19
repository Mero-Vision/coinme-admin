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
        $userData = [
            'name' => 'Reyan Shrestha',
            'email' => 'reyanshrestha@gmail.com',
            'gender'=>'Male',
            'password' => Hash::make('password'),
            'address' => 'Kathmandu',
            'mobile_no' => '9825915122',
            'email_verified_at' => Carbon::now(),
            'status'=>'admin',

        ];

        $user = User::firstOrCreate(['email' => $userData['email']], $userData);
        $user->assignRole(User::ADMIN);

        $url = asset('assets/img/reyan.jpeg');
        $user->addMediaFromUrl($url)->toMediaCollection('profile_image');
    }
}