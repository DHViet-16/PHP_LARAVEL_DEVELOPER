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
            ->assertJsonPath('data.0.is_published', true);
    }
    public function test_single_post_endpoint_returns_resource(): void
    {
        $user = \App\Models\User::factory()->create();

        $post = \App\Models\Post::factory()->create([
            'user_id' => $user->id,
            'title' => 'Resource Test',
            'content' => 'Testing a single post',
        ]);

        $response = $this->getJson('/posts/' . $post->id);

        $response->assertOk()
            ->assertJsonPath('data.id', $post->id)
            ->assertJsonPath('data.title', 'Resource test')
            ->assertJsonPath('data.content', 'Testing a single post');
    }

    public function test_missing_post_returns_404(): void
    {
        $response = $this->getJson('/posts/999999');

        $response->assertNotFound();
    }
}
