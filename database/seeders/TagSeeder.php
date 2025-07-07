<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = ['Laravel', 'PHP', 'JavaScript', 'Vue.js', 'React', 'Tailwind CSS', 'Next.js', 'API Development'];

        foreach ($tags as $tagName) {
            // Use firstOrCreate to prevent creating duplicate tags
            Tag::firstOrCreate(
                ['slug' => Str::slug($tagName)],
                ['name' => $tagName]
            );
        }
    }
}
