<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

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
}
