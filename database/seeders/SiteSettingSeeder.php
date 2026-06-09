<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'hero_tagline',  'value' => 'Lutong Bahay, Luto ng Puso ❤️'],
            ['key' => 'hero_sub',      'value' => 'Authentic Filipino home cooking, made with love and ordered straight to your door.'],
            ['key' => 'about_name',    'value' => 'Tita Nena'],
            ['key' => 'about_text',    'value' => 'Si Tita ay nagluluto ng tunay na pagkaing Pilipino mula pa noong bata pa siya. Bawat putahe ay may kwento, may pagmamahal, at linamnam na hindi mo mahahanap sa labas.'],
            ['key' => 'about_image',   'value' => ''],
            ['key' => 'footer_note',   'value' => 'Orders via Facebook Messenger only. Payment via GCash.'],
        ];

        foreach ($settings as $s) {
            SiteSetting::updateOrCreate(['key' => $s['key']], ['value' => $s['value']]);
        }
    }
}