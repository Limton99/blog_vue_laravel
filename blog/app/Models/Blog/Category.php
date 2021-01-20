<?php

namespace App\Models\Blog;

use App\Models\Blog\Blog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    use HasFactory;

    /**
     * Relation With blogs
     *
     * @return BelongsToMany
     */
    public function blogs() {
        return $this->belongsToMany(Blog::class, 'user_tags');
    }
}
