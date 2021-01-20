<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Roles
 * @package App\Models
 */
class Roles extends Model
{
    use HasFactory;

    /**
     * Relation With Users
     *
     * @return BelongsToMany
     */
    public function users() {
        return $this->belongsToMany(User::class, "user_roles");
    }
}
