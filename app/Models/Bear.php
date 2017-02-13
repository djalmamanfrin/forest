<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Bear
 * @package App\Models
 */
class Bear extends Model
{
    /**
     * bear has many fish
     * @return HasMany
     */
    public function fishes(): HasMany
    {
        return $this->hasMany(Fish::class);
    }

    /**
     * bear has many tree
     * @return HasMany
     */
    public function trees(): HasMany
    {
        return $this->hasMany(Tree::class);
    }

    /**
     * Many picnics belongs many bears
     * @return BelongsToMany
     */
    public function picnics(): BelongsToMany
    {
        return $this->belongsToMany(Picnic::class)->withPivot(['created_at', 'updated_at']);
    }
}
