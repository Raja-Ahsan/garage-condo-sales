<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_from_admin_dashboard(): void
    {
        $response = $this->get(route('admin.dashboard'));

        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_users_can_view_admin_dashboard(): void
    {
        $user = User::factory()->create([
            'role' => 'admin',
            'name' => 'Admin Tester',
        ]);

        $response = $this->actingAs($user)->get(route('admin.dashboard'));

        $response->assertOk();
        $response->assertSee('Welcome Admin Tester!', false);
        $response->assertSee('Listing Price', false);
    }
}
