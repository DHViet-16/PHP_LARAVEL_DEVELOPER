<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function scopeByUser($query, int $userId)
    {
        return $query->where('user_id', $userId);
    }
    public function scopeWithTitle($query, string $title)
    {
        return $query->where('title', $title);
    }
    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            // 'metadata' => 'array',
        ];
    }
    protected function title(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => ucfirst(strtolower(trim($value))),
        );
    }
}

// $user = User::find(1);

// $posts = Post::with('user')->where('user_id', $user['id'])->get();
// $posts = Post::where('user_id', $user->id)
//     ->latest()
//     ->get();

// $posts = Post::byUser(1)
//     ->withTitle('Laravel Eloquent')
//     ->latest()
//     ->get();
