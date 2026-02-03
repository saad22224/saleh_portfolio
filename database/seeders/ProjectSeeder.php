<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Category;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $snapcat = Category::where('name_en', 'Snapchat Lenses')->first();
        $motioncat = Category::where('name_en', 'Motion Graphics')->first();

        // Sample Snap Lenses
        for ($i = 1; $i <= 6; $i++) {
            Project::create([
                'category_id' => $snapcat->id,
                'title_en' => "Lens Project $i",
                'title_ar' => "مشروع عدسة $i",
                'description_en' => "High quality AR experience for brand $i.",
                'description_ar' => "تجربة واقع معزز عالية الجودة للعلامة التجارية $i.",
                'thumbnail' => "projects/OZm6uVaIsbmqp0r1TDv6BnY64uggBMZENqF0Kw0f.jpg",
                'lens_link' => "projects/OZm6uVaIsbmqp0r1TDv6BnY64uggBMZENqF0Kw0f.jpg",
                'sort_order' => $i,
                'is_featured' => $i <= 4
            ]);
        }

        // Sample Motion Graphics
        for ($i = 1; $i <= 6; $i++) {
            Project::create([
                'category_id' => $motioncat->id,
                'title_en' => "Motion Work $i",
                'title_ar' => "عمل موشن جرافيك $i",
                'description_en' => "Professional video production for social media.",
                'description_ar' => "إنتاج فيديو احترافي لوسائل التواصل الاجتماعي.",
                'thumbnail' => "projects/OZm6uVaIsbmqp0r1TDv6BnY64uggBMZENqF0Kw0f.jpg",
                'video_url' => "https://www.youtube.com/watch?v=dQw4w9WgXcQ",
                'sort_order' => $i,
                'is_featured' => $i <= 4
            ]);
        }
    }
}
