<?php

namespace App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Comment
 * @package App\Models\Blog
 */
class Comment extends Model
{
    use HasFactory;

    /**
     * Relation With User
     *
     * @return BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation With Blogs
     *
     * @return BelongsTo
     */
    public function blog() {
        return $this->belongsTo(Blog::class);
    }
}
