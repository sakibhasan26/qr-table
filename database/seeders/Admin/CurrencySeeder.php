<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = array(
            array('admin_id' => '1','country' => 'United States','name' => 'United States dollar','code' => 'USD','symbol' => '$','type' => 'FIAT','flag' => 'seeder/usa.webp','rate' => '1.00000000','sender' => '1','receiver' => '1','default' => '1','status' => '1','created_at' => '2024-01-17 07:17:53','updated_at' => '2024-01-17 07:18:24'),

            array('admin_id' => '1','country' => 'Spain','name' => 'Euro','code' => 'EUR','symbol' => '€','type' => 'FIAT','flag' => 'seeder/spain.webp','rate' => '0.87000000','sender' => '0','receiver' => '0','default' => '0','status' => '1','created_at' => '2025-05-09 09:16:06','updated_at' => '2025-06-20 15:49:25'),

            array('admin_id' => '1','country' => 'Germany','name' => 'Euro','code' => 'EUR','symbol' => '€','type' => 'FIAT','flag' => 'seeder/germany.webp','rate' => '0.87000000','sender' => '0','receiver' => '0','default' => '0','status' => '1','created_at' => '2025-05-09 09:30:00','updated_at' => '2025-06-20 15:48:46'),

            array('admin_id' => '1','country' => 'France','name' => 'Euro','code' => 'EUR','symbol' => '€','type' => 'FIAT','flag' => 'seeder/france.webp','rate' => '0.87000000','sender' => '0','receiver' => '0','default' => '0','status' => '1','created_at' => '2025-05-09 09:30:33','updated_at' => '2025-06-20 15:49:04'),

            array('admin_id' => '1','country' => 'Italy','name' => 'Euro','code' => 'EUR','symbol' => '€','type' => 'FIAT','flag' => 'seeder/italy.webp','rate' => '0.87000000','sender' => '0','receiver' => '0','default' => '0','status' => '1','created_at' => '2025-06-20 15:50:11','updated_at' => '2025-06-20 15:50:12'),

            array('admin_id' => '1','country' => 'United Kingdom','name' => 'British pound','code' => 'GBP','symbol' => '£','type' => 'FIAT','flag' => 'seeder/uk.webp','rate' => '0.74000000','sender' => '0','receiver' => '0','default' => '0','status' => '1','created_at' => '2025-06-20 15:50:36','updated_at' => '2025-06-20 15:50:36')
        );

        Currency::insert($currencies);
        // Currency::factory()->times(50)->create();
    }
}
