<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

$user = User::find(1);

$posts = Post::with('user')->where('user_id', $user['id'])->get();
$posts = Post::where('user_id', $user->id)
    ->latest()
    ->get();
