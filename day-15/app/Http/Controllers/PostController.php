<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function store(StorePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['user_id'] = 1;

        Post::create($validated);

        return redirect('/posts')->with(
            'success',
            'Post created successfully.'
        );
    }
    public function show(int $id): PostResource
    {
        $post = Post::findOrFail($id);

        return new PostResource($post);
    }

    public function index()
    {
        $posts = Post::latest()->get();

        return PostResource::collection($posts);
    }
}
