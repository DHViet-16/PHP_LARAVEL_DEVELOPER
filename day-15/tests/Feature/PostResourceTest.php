<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostResourceTest extends TestCase
{
    use RefreshDatabase;

    public function test_posts_endpoint_returns_resource_collection(): void
    {
        $user = User::factory()->create();

        Post::factory()->create([
            'user_id' => $user->id,
            'title' => 'First post',
            'content' => 'First content',
            'is_published' => true,
        ]);

        $response = $this->getJson('/posts');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'title',
                        'content',
                        'is_published',
                        'created_at',
                    ],
                ],
            ])
            ->assertJsonPath('data.0.title', 'First post')
            ->assertJsonPath('data.0.is_published', true)
            ->assertJsonMissingPath('data.0.internal_notes');
    }
    public function test_single_post_endpoint_returns_resource(): void
    {
        $user = \App\Models\User::factory()->create();

        $post = \App\Models\Post::factory()->create([
            'user_id' => $user->id,
            'title' => 'Laravel api',
            'content' => 'Learning API Resources',
        ]);

        $response = $this->getJson('/posts/' . $post->id);

        $response->assertOk()
            ->assertJsonPath('data.id', $post->id)
            ->assertJsonPath('data.title', 'Laravel api')
            ->assertJsonPath('data.content', 'Learning API Resources');
    }

    public function test_missing_post_returns_404(): void
    {
        $response = $this->getJson('/posts/999999');

        $response->assertNotFound();
    }

    public function test_api_can_create_post_and_returns_201(): void
    {
        \App\Models\User::factory()->create(['id' => 1]);

        $response = $this->postJson('/api/posts', [
            'title' => 'Laravel api',
            'content' => 'Learning API Resources',
        ]);

        $response->assertCreated()
            ->assertJsonPath('data.title', 'Laravel api')
            ->assertJsonPath('data.content', 'Learning API Resources');

        $this->assertDatabaseHas('posts', [
            'title' => 'Laravel api',
            'content' => 'Learning API Resources',
        ]);
    }
}
