<?php

declare(strict_types = 1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Tree
 * @package App
 */
class Tree extends Model
{
    public function bear(): HasMany
    {
        return $this->hasMany(Bear::class);
    }
}
