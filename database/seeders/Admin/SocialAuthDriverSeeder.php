<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\SocialAuthDriver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\Uid\Ulid;

class SocialAuthDriverSeeder extends Seeder
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
                'ulid'              => Ulid::generate(),
                'panel'             => SocialAuthDriver::PANEL_USER,
                'driver_name'       => "Google",
                'driver_slug'       => "google",
                'credentials'       => [
                    "client_id"         => ['title' => 'Client ID', 'value' => ''],
                    "client_secret"     => ['title' => 'Client Secret', 'value' => ''],
                ],
                'image'             => "google-image.png",
                'status'            => true,
                'created_at'        => now(),
            ],
            [
                'ulid'              => Ulid::generate(),
                'panel'             => SocialAuthDriver::PANEL_USER,
                'driver_name'       => "Envato",
                'driver_slug'       => "envato",
                'credentials'       => [
                    "client_id"         => ['title' => 'Client ID', 'value' => ''],
                    "client_secret"     => ['title' => 'Client Secret', 'value' => ''],
                ],
                'image'             => "envato-image.png",
                'status'            => true,
                'created_at'        => now(),
            ]
        ];

        foreach($data as $item){
            if(SocialAuthDriver::where('panel', $item['panel'])->where('driver_slug', $item['driver_slug'])->exists() == false) {
                SocialAuthDriver::create($item);
            }
        }
    }
}
