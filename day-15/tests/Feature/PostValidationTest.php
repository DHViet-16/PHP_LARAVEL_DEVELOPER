<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_title_is_required(): void
    {
        User::factory()->create();

        $response = $this->post('/posts', [
            'content' => 'Learning Laravel validation',
        ]);

        $response->assertSessionHasErrors('title');

        $this->assertDatabaseCount('posts', 0);
    }

    public function test_content_can_be_null(): void
    {
        User::factory()->create(['id' => 1]);

        $response = $this->post('/posts', [
            'title' => 'Laravel Validation',
            'content' => null,
        ]);

        $response->assertRedirect('/posts');

        $this->assertDatabaseHas('posts', [
            'title' => 'Laravel validation',
            'content' => null,
            'user_id' => 1,
        ]);
    }

    public function test_api_returns_422_when_title_is_missing(): void
    {
        $response = $this->postJson('/posts', [
            'content' => 'Learning Laravel API',
        ]);

        $response->assertUnprocessable()
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'title'
                ]
            ])
            ->assertJsonValidationErrors(['title']);
    }
}
