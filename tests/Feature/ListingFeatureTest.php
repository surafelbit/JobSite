<?php

namespace Tests\Feature;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListingFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_displays_listings_and_search_form(): void
    {
        Listing::factory()->create([
            'title' => 'Senior Laravel Developer',
            'company' => 'Acme Labs',
            'location' => 'Remote',
            'tags' => 'Laravel, PHP',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Senior Laravel Developer');
        $response->assertSee('Search by role, stack, or company');
    }

    public function test_authenticated_user_can_create_featured_listing(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/listing', [
            'company' => 'Bright Agency',
            'title' => 'Backend Engineer',
            'location' => 'Berlin',
            'job_type' => 'Remote',
            'salary' => '$120k',
            'is_featured' => true,
            'website' => 'https://example.com',
            'email' => 'hiring@example.com',
            'tags' => 'Laravel, PHP',
            'description' => 'Great role for a strong backend developer.',
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('listings', ['company' => 'Bright Agency', 'is_featured' => 1]);
    }
}
