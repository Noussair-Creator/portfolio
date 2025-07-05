<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph(5),
            'image_path' => 'project-images/placeholder.jpg', // Assuming a placeholder image exists
            'project_url' => $this->faker->url,
            'repo_url' => $this->faker->url,
        ];
    }
}
