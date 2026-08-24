<?php

namespace Tests\Feature\Admin;

use App\Models\Slider;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SliderTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_manage_sliders(): void
    {
        $this->get(route('admin.sliders.index'))->assertRedirect(route('login'));
    }

    public function test_admin_can_view_slider_index(): void
    {
        $user = User::factory()->create(['role' => 'admin']);

        $this->actingAs($user)
            ->get(route('admin.sliders.index'))
            ->assertOk()
            ->assertSee('Hero Slider', false);
    }

    public function test_admin_can_create_a_slider(): void
    {
        Storage::fake('public');

        $user = User::factory()->create(['role' => 'admin']);
        $file = UploadedFile::fake()->image('hero.jpg', 1200, 800);

        $response = $this->actingAs($user)->post(route('admin.sliders.store'), [
            'title' => 'Exterior suite',
            'image' => $file,
            'sort_order' => 1,
            'status' => 'active',
        ]);

        $response->assertRedirect(route('admin.sliders.index'));
        $this->assertDatabaseHas('sliders', [
            'title' => 'Exterior suite',
            'status' => 'active',
            'sort_order' => 1,
        ]);
    }

    public function test_homepage_uses_active_sliders_for_hero(): void
    {
        Slider::create([
            'title' => 'Dynamic slide',
            'image' => 'https://example.com/slide.jpg',
            'sort_order' => 1,
            'status' => 'active',
        ]);

        Slider::create([
            'title' => 'Hidden slide',
            'image' => 'https://example.com/hidden.jpg',
            'sort_order' => 2,
            'status' => 'inactive',
        ]);

        $response = $this->get(route('web.home'));

        $response->assertOk();
        $content = $response->getContent();
        $this->assertStringContainsString('example.com', $content);
        $this->assertStringContainsString('slide.jpg', $content);
        $this->assertStringNotContainsString('hidden.jpg', $content);
    }
}
