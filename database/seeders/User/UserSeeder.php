<?php

namespace Database\Seeders\User;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'firstname'         => "Test",
                'lastname'          => "User One",
                'email'             => "user@appdevs.net",
                'username'          => "testuser",
                'status'            => true,
                'password'          => Hash::make("appdevs"),
                'email_verified'    => true,
                'sms_verified'      => true,
                'kyc_verified'      => true,
                'created_at'        => now(),
            ],
            [
                'firstname'         => "Test",
                'lastname'          => "User Two",
                'email'             => "user2@appdevs.net",
                'username'          => "testuser2",
                'status'            => true,
                'password'          => Hash::make("appdevs"),
                'email_verified'    => true,
                'sms_verified'      => true,
                'kyc_verified'      => true,
                'created_at'        => now(),
            ],
            [
                'firstname'         => "Test",
                'lastname'          => "User Three",
                'email'             => "user3@appdevs.net",
                'username'          => "testuser3",
                'status'            => true,
                'password'          => Hash::make("appdevs"),
                'email_verified'    => true,
                'sms_verified'      => true,
                'kyc_verified'      => false,
                'created_at'        => now(),
            ],
            [
                'firstname'         => "Test",
                'lastname'          => "User Four",
                'email'             => "user4@appdevs.net",
                'username'          => "testuser4",
                'status'            => true,
                'password'          => Hash::make("appdevs"),
                'email_verified'    => true,
                'sms_verified'      => true,
                'kyc_verified'      => false,
                'created_at'        => now(),
            ],
            [
                'firstname'         => "Test",
                'lastname'          => "User Five",
                'email'             => "user5@appdevs.net",
                'username'          => "testuser5",
                'status'            => true,
                'password'          => Hash::make("appdevs"),
                'email_verified'    => true,
                'sms_verified'      => true,
                'kyc_verified'      => false,
                'created_at'        => now(),
            ],
        ];

        User::insert($data);
    }
}
