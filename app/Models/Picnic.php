<?php

declare(strict_types = 1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Picnic
 * @package App
 */
class Picnic extends Model
{
    public function bears(): BelongsToMany
    {
        return $this->belongsToMany(Bear::class)->withPivot(['created_at', 'updated_at']);
    }
}
