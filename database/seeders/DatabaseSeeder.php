<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call all necessary seeders here, in the correct order
        $this->call([
            UserSeeder::class,
            TagSeeder::class, // <-- ADD THIS LINE
        ]);

        // Now that TagSeeder has run, fetch the tags that were created
        $tags = Tag::all();

        // Check if tags exist before creating projects to avoid errors
        if ($tags->isNotEmpty()) {
            // Create 10 projects and attach 1-3 random tags to each
            Project::factory(10)->create()->each(function ($project) use ($tags) {
                $project->tags()->attach(
                    // This prevents asking for more tags than exist
                    $tags->random(rand(1, min(3, $tags->count())))->pluck('id')->toArray()
                );
            });
        }
    }
}
