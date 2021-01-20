<?php

namespace App\Models\Blog;

use App\Models\Blog\Category;
use App\Models\Blog\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Blog
 * @package App\Models\Blog
 */
class Blog extends Model
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
     * Relation With Tags
     *
     * @return BelongsToMany
     */
    public function tags() {
        return $this->belongsToMany(Tag::class, 'blog_tags');
    }

    /**
     * Relation With Categories
     *
     * @return BelongsToMany
     */
    public function categories() {
        return $this->belongsToMany(Category::class, 'blog_categories');
    }

    /**
     * Relation With Comments
     *
     * @return HasMany
     */
    public function comment() {
        return $this->hasMany(Comment::class);
    }
}
