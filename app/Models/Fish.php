<?php

declare(strict_types = 1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Fish
 * @package App
 */
class Fish extends Model
{
    public function bear(): HasMany
    {
        return $this->hasMany(Bear::class);
    }
}
