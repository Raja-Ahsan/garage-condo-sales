<?php

namespace Tests\Feature\Admin;

use App\Models\ContactInquiry;
use App\Models\User;
use Database\Seeders\CmsModulePermissionsSeeder;
use Database\Seeders\CmsModuleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InquiryTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_view_inquiries(): void
    {
        $this->get(route('admin.inquiries.index'))->assertRedirect(route('login'));
    }

    public function test_admin_can_list_inquiries_in_the_sidebar(): void
    {
        $this->seed(CmsModuleSeeder::class);
        $this->seed(CmsModulePermissionsSeeder::class);

        $user = User::factory()->create(['role' => 'admin']);
        ContactInquiry::factory()->create([
            'name' => 'Jordan Buyer',
            'email' => 'jordan@example.com',
        ]);

        $this->actingAs($user)
            ->get(route('admin.inquiries.index'))
            ->assertOk()
            ->assertSee('Inquiries', false)
            ->assertSee('Jordan Buyer', false)
            ->assertSee('jordan@example.com', false);
    }

    public function test_admin_can_view_an_inquiry_and_it_is_marked_read(): void
    {
        $user = User::factory()->create(['role' => 'admin']);
        $inquiry = ContactInquiry::factory()->create([
            'name' => 'Sam Collector',
            'message' => 'Please schedule a private tour.',
            'status' => 'new',
        ]);

        $this->actingAs($user)
            ->get(route('admin.inquiries.show', $inquiry))
            ->assertOk()
            ->assertSee('Sam Collector', false)
            ->assertSee('Please schedule a private tour.', false);

        $this->assertDatabaseHas('contact_inquiries', [
            'id' => $inquiry->id,
            'status' => 'read',
        ]);
    }

    public function test_admin_can_delete_an_inquiry(): void
    {
        $user = User::factory()->create(['role' => 'admin']);
        $inquiry = ContactInquiry::factory()->create();

        $this->actingAs($user)
            ->delete(route('admin.inquiries.destroy', $inquiry))
            ->assertRedirect(route('admin.inquiries.index'));

        $this->assertDatabaseMissing('contact_inquiries', ['id' => $inquiry->id]);
    }
}
