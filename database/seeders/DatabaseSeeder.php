<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// We no longer need the Project and Tag models here for seeding

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // This will run the seeders that create the essential starting data.
        $this->call([
            UserSeeder::class,
            TagSeeder::class,
            // We are no longer creating fake projects in production.
            // You will add your real projects through the admin panel.
        ]);
    }
}
