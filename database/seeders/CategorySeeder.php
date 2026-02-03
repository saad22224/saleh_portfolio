<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name_en' => 'Snapchat Lenses', 'name_ar' => 'عدسات سناب شات'],
            ['name_en' => 'Motion Graphics', 'name_ar' => 'موشن جرافيك'],
            ['name_en' => 'Video Editing', 'name_ar' => 'مونتاج فيديو'],
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name_en' => $cat['name_en'],
                'name_ar' => $cat['name_ar'],
                'slug' => Str::slug($cat['name_en']),
            ]);
        }
    }
}
