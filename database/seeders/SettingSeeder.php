<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'Fondation Halya', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Agir ensemble pour un avenir durable', 'group' => 'general'],
            ['key' => 'site_email', 'value' => 'info@halya.org', 'group' => 'general'],
            ['key' => 'site_phone', 'value' => '+33 1 23 45 67 89', 'group' => 'general'],
            ['key' => 'site_address', 'value' => '123 Avenue de l\'Innovation, 75001 Paris, France', 'group' => 'general'],
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/halya', 'group' => 'social'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/halya', 'group' => 'social'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/halya', 'group' => 'social'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com/company/halya', 'group' => 'social'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
