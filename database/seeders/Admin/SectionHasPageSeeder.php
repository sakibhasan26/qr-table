<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\SetupPageHasSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionHasPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setup_page_has_sections = array(
        array('id' => '1','setup_page_id' => '1','site_section_id' => '2','position' => '1','status' => '1','created_at' => '2025-10-17 04:13:41','updated_at' => '2025-10-17 04:13:41'),
          array('id' => '2','setup_page_id' => '1','site_section_id' => '7','position' => '6','status' => '1','created_at' => '2025-10-17 04:13:41','updated_at' => '2025-10-17 05:13:50'),
          array('id' => '3','setup_page_id' => '1','site_section_id' => '11','position' => '9','status' => '0','created_at' => '2025-10-17 04:13:41','updated_at' => '2025-10-17 05:13:50'),
          array('id' => '4','setup_page_id' => '1','site_section_id' => '12','position' => '10','status' => '0','created_at' => '2025-10-17 04:13:41','updated_at' => '2025-10-17 05:13:50'),
          array('id' => '5','setup_page_id' => '1','site_section_id' => '13','position' => '5','status' => '1','created_at' => '2025-10-17 04:13:41','updated_at' => '2025-10-17 04:13:41'),
          array('id' => '6','setup_page_id' => '1','site_section_id' => '21','position' => '4','status' => '1','created_at' => '2025-10-17 04:13:41','updated_at' => '2025-10-17 05:13:50'),
          array('id' => '7','setup_page_id' => '1','site_section_id' => '22','position' => '5','status' => '1','created_at' => '2025-10-17 04:13:41','updated_at' => '2025-10-17 05:13:50'),
          array('id' => '8','setup_page_id' => '1','site_section_id' => '23','position' => '7','status' => '1','created_at' => '2025-10-17 04:13:41','updated_at' => '2025-10-17 05:13:50'),
          array('id' => '9','setup_page_id' => '1','site_section_id' => '24','position' => '8','status' => '1','created_at' => '2025-10-17 04:13:41','updated_at' => '2025-10-17 05:13:50'),
          array('id' => '10','setup_page_id' => '1','site_section_id' => '25','position' => '11','status' => '0','created_at' => '2025-10-17 04:13:41','updated_at' => '2025-10-17 05:13:50'),
          array('id' => '11','setup_page_id' => '1','site_section_id' => '26','position' => '12','status' => '0','created_at' => '2025-10-17 04:13:41','updated_at' => '2025-10-17 05:13:50'),
          array('id' => '12','setup_page_id' => '1','site_section_id' => '27','position' => '13','status' => '0','created_at' => '2025-10-17 04:13:41','updated_at' => '2025-10-17 05:13:50'),
          array('id' => '13','setup_page_id' => '1','site_section_id' => '30','position' => '2','status' => '1','created_at' => '2025-10-17 04:13:41','updated_at' => '2025-10-17 05:13:50'),
          array('id' => '15','setup_page_id' => '1','site_section_id' => '32','position' => '3','status' => '1','created_at' => '2025-10-17 04:13:41','updated_at' => '2025-10-17 05:13:50'),
          array('id' => '16','setup_page_id' => '1','site_section_id' => '33','position' => '14','status' => '0','created_at' => '2025-10-17 04:13:41','updated_at' => '2025-10-17 05:13:50'),
          array('id' => '17','setup_page_id' => '1','site_section_id' => '34','position' => '15','status' => '0','created_at' => '2025-10-17 04:30:12','updated_at' => '2025-10-17 05:13:50'),
          array('id' => '18','setup_page_id' => '2','site_section_id' => '2','position' => '4','status' => '0','created_at' => '2025-10-17 04:46:08','updated_at' => '2025-10-17 04:56:50'),
          array('id' => '19','setup_page_id' => '2','site_section_id' => '7','position' => '5','status' => '0','created_at' => '2025-10-17 04:46:08','updated_at' => '2025-10-17 04:56:50'),
          array('id' => '20','setup_page_id' => '2','site_section_id' => '11','position' => '3','status' => '1','created_at' => '2025-10-17 04:46:08','updated_at' => '2025-10-17 04:46:08'),
          array('id' => '21','setup_page_id' => '2','site_section_id' => '12','position' => '6','status' => '0','created_at' => '2025-10-17 04:46:08','updated_at' => '2025-10-17 04:56:50'),
          array('id' => '22','setup_page_id' => '2','site_section_id' => '21','position' => '7','status' => '0','created_at' => '2025-10-17 04:46:08','updated_at' => '2025-10-17 04:56:50'),
          array('id' => '23','setup_page_id' => '2','site_section_id' => '22','position' => '8','status' => '0','created_at' => '2025-10-17 04:46:08','updated_at' => '2025-10-17 04:56:50'),
          array('id' => '24','setup_page_id' => '2','site_section_id' => '23','position' => '9','status' => '0','created_at' => '2025-10-17 04:46:08','updated_at' => '2025-10-17 04:56:50'),
          array('id' => '25','setup_page_id' => '2','site_section_id' => '24','position' => '10','status' => '0','created_at' => '2025-10-17 04:46:08','updated_at' => '2025-10-17 04:56:50'),
          array('id' => '26','setup_page_id' => '2','site_section_id' => '25','position' => '1','status' => '1','created_at' => '2025-10-17 04:46:08','updated_at' => '2025-10-17 04:56:50'),
          array('id' => '27','setup_page_id' => '2','site_section_id' => '26','position' => '11','status' => '0','created_at' => '2025-10-17 04:46:08','updated_at' => '2025-10-17 04:56:50'),
          array('id' => '28','setup_page_id' => '2','site_section_id' => '27','position' => '12','status' => '0','created_at' => '2025-10-17 04:46:08','updated_at' => '2025-10-17 04:56:50'),
          array('id' => '29','setup_page_id' => '2','site_section_id' => '30','position' => '13','status' => '0','created_at' => '2025-10-17 04:46:08','updated_at' => '2025-10-17 04:56:50'),
          array('id' => '30','setup_page_id' => '2','site_section_id' => '32','position' => '14','status' => '0','created_at' => '2025-10-17 04:46:08','updated_at' => '2025-10-17 04:56:50'),
          array('id' => '31','setup_page_id' => '2','site_section_id' => '33','position' => '2','status' => '1','created_at' => '2025-10-17 04:46:08','updated_at' => '2025-10-17 04:56:50'),
          array('id' => '32','setup_page_id' => '2','site_section_id' => '34','position' => '15','status' => '0','created_at' => '2025-10-17 04:46:08','updated_at' => '2025-10-17 04:56:50'),
          array('id' => '33','setup_page_id' => '3','site_section_id' => '2','position' => '5','status' => '0','created_at' => '2025-10-17 04:48:34','updated_at' => '2025-10-17 04:58:26'),
          array('id' => '34','setup_page_id' => '3','site_section_id' => '7','position' => '6','status' => '0','created_at' => '2025-10-17 04:48:34','updated_at' => '2025-10-17 04:58:26'),
          array('id' => '35','setup_page_id' => '3','site_section_id' => '11','position' => '4','status' => '1','created_at' => '2025-10-17 04:48:34','updated_at' => '2025-10-17 04:58:25'),
          array('id' => '36','setup_page_id' => '3','site_section_id' => '12','position' => '7','status' => '0','created_at' => '2025-10-17 04:48:34','updated_at' => '2025-10-17 04:58:26'),
          array('id' => '37','setup_page_id' => '3','site_section_id' => '21','position' => '8','status' => '0','created_at' => '2025-10-17 04:48:34','updated_at' => '2025-10-17 04:58:26'),
          array('id' => '38','setup_page_id' => '3','site_section_id' => '22','position' => '9','status' => '0','created_at' => '2025-10-17 04:48:34','updated_at' => '2025-10-17 04:58:26'),
          array('id' => '39','setup_page_id' => '3','site_section_id' => '23','position' => '10','status' => '0','created_at' => '2025-10-17 04:48:34','updated_at' => '2025-10-17 04:58:26'),
          array('id' => '40','setup_page_id' => '3','site_section_id' => '24','position' => '11','status' => '0','created_at' => '2025-10-17 04:48:34','updated_at' => '2025-10-17 04:58:26'),
          array('id' => '41','setup_page_id' => '3','site_section_id' => '25','position' => '12','status' => '0','created_at' => '2025-10-17 04:48:34','updated_at' => '2025-10-17 04:58:26'),
          array('id' => '42','setup_page_id' => '3','site_section_id' => '26','position' => '1','status' => '1','created_at' => '2025-10-17 04:48:34','updated_at' => '2025-10-17 04:57:41'),
          array('id' => '43','setup_page_id' => '3','site_section_id' => '27','position' => '3','status' => '1','created_at' => '2025-10-17 04:48:34','updated_at' => '2025-10-17 04:58:25'),
          array('id' => '44','setup_page_id' => '3','site_section_id' => '30','position' => '13','status' => '0','created_at' => '2025-10-17 04:48:34','updated_at' => '2025-10-17 04:57:41'),
          array('id' => '45','setup_page_id' => '3','site_section_id' => '32','position' => '14','status' => '0','created_at' => '2025-10-17 04:48:34','updated_at' => '2025-10-17 04:57:41'),
          array('id' => '46','setup_page_id' => '3','site_section_id' => '33','position' => '15','status' => '0','created_at' => '2025-10-17 04:48:34','updated_at' => '2025-10-17 04:57:41'),
          array('id' => '47','setup_page_id' => '3','site_section_id' => '34','position' => '2','status' => '1','created_at' => '2025-10-17 04:48:34','updated_at' => '2025-10-17 04:57:41'),
          array('id' => '48','setup_page_id' => '4','site_section_id' => '2','position' => '3','status' => '0','created_at' => '2025-10-17 04:49:07','updated_at' => '2025-10-17 05:01:18'),
          array('id' => '49','setup_page_id' => '4','site_section_id' => '7','position' => '8','status' => '0','created_at' => '2025-10-17 04:49:07','updated_at' => '2025-10-17 05:01:18'),
          array('id' => '50','setup_page_id' => '4','site_section_id' => '11','position' => '2','status' => '1','created_at' => '2025-10-17 04:49:07','updated_at' => '2025-10-17 05:01:18'),
          array('id' => '51','setup_page_id' => '4','site_section_id' => '12','position' => '1','status' => '1','created_at' => '2025-10-17 04:49:07','updated_at' => '2025-10-17 05:01:18'),
          array('id' => '52','setup_page_id' => '4','site_section_id' => '21','position' => '6','status' => '0','created_at' => '2025-10-17 04:49:07','updated_at' => '2025-10-17 05:01:18'),
          array('id' => '53','setup_page_id' => '4','site_section_id' => '22','position' => '7','status' => '0','created_at' => '2025-10-17 04:49:07','updated_at' => '2025-10-17 05:01:18'),
          array('id' => '54','setup_page_id' => '4','site_section_id' => '23','position' => '9','status' => '0','created_at' => '2025-10-17 04:49:07','updated_at' => '2025-10-17 05:01:18'),
          array('id' => '55','setup_page_id' => '4','site_section_id' => '24','position' => '10','status' => '0','created_at' => '2025-10-17 04:49:07','updated_at' => '2025-10-17 05:01:18'),
          array('id' => '56','setup_page_id' => '4','site_section_id' => '25','position' => '11','status' => '0','created_at' => '2025-10-17 04:49:07','updated_at' => '2025-10-17 04:55:28'),
          array('id' => '57','setup_page_id' => '4','site_section_id' => '26','position' => '12','status' => '0','created_at' => '2025-10-17 04:49:07','updated_at' => '2025-10-17 04:55:28'),
          array('id' => '58','setup_page_id' => '4','site_section_id' => '27','position' => '13','status' => '0','created_at' => '2025-10-17 04:49:07','updated_at' => '2025-10-17 04:55:28'),
          array('id' => '59','setup_page_id' => '4','site_section_id' => '30','position' => '4','status' => '0','created_at' => '2025-10-17 04:49:07','updated_at' => '2025-10-17 05:01:18'),
          array('id' => '60','setup_page_id' => '4','site_section_id' => '32','position' => '5','status' => '0','created_at' => '2025-10-17 04:49:07','updated_at' => '2025-10-17 05:01:18'),
          array('id' => '61','setup_page_id' => '4','site_section_id' => '33','position' => '14','status' => '0','created_at' => '2025-10-17 04:49:07','updated_at' => '2025-10-17 04:55:28'),
          array('id' => '62','setup_page_id' => '4','site_section_id' => '34','position' => '15','status' => '0','created_at' => '2025-10-17 04:49:07','updated_at' => '2025-10-17 04:55:28')
        );

        SetupPageHasSection::insert($setup_page_has_sections);
    }
}
