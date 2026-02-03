<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            CategorySeeder::class,
            ProjectSeeder::class,
            ClientSeeder::class,
        ]);

        \App\Models\Setting::updateOrCreate(['key' => 'whatsapp'], [
            'value_en' => '+966500000000',
            'value_ar' => '+966500000000'
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
    }
}
