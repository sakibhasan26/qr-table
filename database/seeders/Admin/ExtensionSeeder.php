<?php

namespace Database\Seeders\Admin;

use App\Constants\ExtensionConst;
use App\Models\Admin\Extension;
use Illuminate\Database\Seeder;

class ExtensionSeeder extends Seeder
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
                'name'              => "Tawk",
                'slug'              => ExtensionConst::TAWK_TO_SLUG,
                'description'       => "Go to your tawk to dashbaord. Click [setting icon] on top bar. Then click [Chat Widget] link from sidebar and follow the screenshot bellow. Copy property ID and paste it in Property ID field. Then copy widget ID and paste it in Widget ID field. Finally click on [Update] button and you are ready to go.",
                'script'            => null,
                'shortcode'         => json_encode([ExtensionConst::TAWK_TO_PROPERTY_ID => ['title' => 'Property ID', 'value' => ''],ExtensionConst::TAWK_TO_WIDGET_ID => ['title' => 'Widget ID', 'value' => '']]),
                'support_image'     => "instruction-tawk-to.png",
                'image'             => "logo-tawk-to.png",
                'status'            => true,
                'created_at'        => now(),
            ],
            // [
            //     'name'              => "Google Recaptcha",
            //     'slug'              => "google-recaptcha",
            //     'description'       => "Google Recaptcha",
            //     'script'            => null,
            //     'shortcode'         => json_encode(["app_key" => ['title' => 'App key', 'value' => '']]),
            //     'support_image'     => "recaptcha.png",
            //     'image'             => "recaptcha3.png",
            //     'status'            => true,
            //     'created_at'        => now(),
            // ],
            // [
            //     'name'              => "Google Analytics",
            //     'slug'              => "google-analytics",
            //     'description'       => "Google Analytics",
            //     'script'            => null,
            //     'shortcode'         => json_encode(["app_key" => ['title' => 'App key', 'value' => '']]),
            //     'support_image'     => "ganalytics.png",
            //     'image'             => "customcaptcha.png",
            //     'status'            => true,
            //     'created_at'        => now(),
            // ]
        ];
        Extension::insert($data);
    }
}
