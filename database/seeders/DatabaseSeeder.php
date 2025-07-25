<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // User::factory(10)->create();

       $user= User::factory()->create([
            'name' => 'user',
            'email' => 'surafel@gmail.com',
        ]);
        Listing::factory(6)->create(['user_id'=>$user->id]);
        // Listing::create( [
        //     'title' => 'Laravel Developer',
        //     'tags' => 'laravel, php, backend',
        //     'company' => 'Acme Corp',
        //     'location' => 'New York, NY',
        //     'email' => 'hr@acme.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'We are looking for a Laravel developer experienced with Laravel, PHP, and MySQL.',
        // ]);
        // Listing::create([
        //     'title' => 'React Developer',
        //     'tags' => 'react, javascript, frontend',
        //     'company' => 'Pixel Studios',
        //     'location' => 'San Francisco, CA',
        //     'email' => 'jobs@pixelstudios.com',
        //     'website' => 'https://www.pixelstudios.com',
        //     'description' => 'Frontend position for skilled React developers with knowledge of modern JS frameworks.',
        // ]);
    }
}
