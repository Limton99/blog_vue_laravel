<?php

namespace App\Models\Blog;

use App\Models\Blog\Blog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Tag
 * @package App\Models
 */
class Tag extends Model
{
    use HasFactory;

    /**
     * Relation With Blogs
     *
     * @return BelongsToMany
     */
    public function blogs() {
        return $this->belongsToMany(Blog::class, 'user_tags');
    }
}
