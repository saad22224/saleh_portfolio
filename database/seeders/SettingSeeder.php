<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_title', 'value_en' => 'Professional Snapchat Lens Designer', 'value_ar' => 'مصمم عدسات سناب شات محترف', 'type' => 'text'],
            ['key' => 'bio', 'value_en' => 'I create immersive AR experiences.', 'value_ar' => 'أقوم بإنشاء تجارب واقع معزز غامرة.', 'type' => 'text'],
            ['key' => 'email', 'value_en' => 'contact@saleh.com', 'value_ar' => 'contact@saleh.com', 'type' => 'text'],
            ['key' => 'location', 'value_en' => 'Saudi Arabia', 'value_ar' => 'المملكة العربية السعودية', 'type' => 'text'],
            ['key' => 'hero_image', 'value_en' => null, 'value_ar' => null, 'type' => 'image'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
