<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Picnic
 * @package App\Models
 */
class Picnic extends Model
{
    /**
     * Many picnics Belong Many bears
     * @return BelongsToMany
     */
    public function bears(): BelongsToMany
    {
        return $this->belongsToMany(Bear::class)->withPivot(['created_at', 'updated_at']);
    }
}
