<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Slider;
use App\Models\Program;
use App\Models\Partner;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Administrateur',
            'email' => 'admin@halya.org',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $this->call([
            SliderSeeder::class,
            ProgramSeeder::class,
            PartnerSeeder::class,
            TestimonialSeeder::class,
            SettingSeeder::class,
        ]);
    }
}
