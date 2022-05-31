<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_name',
        'body',
        'post_id',
    ];

    public function post()
    {
        return $this->BelongsTo(Post::class);
    }
}
