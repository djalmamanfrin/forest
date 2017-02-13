<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Tree
 * @package App\Models
 */
class Tree extends Model
{
    /**
     * One tree belong to one bears
     * @return BelongsTo
     */
    public function bear(): BelongsTo
    {
        return $this->belongsTo(Bear::class);
    }
}
