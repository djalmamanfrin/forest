<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Fish
 * @package App\Models
 */
class Fish extends Model
{
    protected $table = 'fishes';

    /**
     * One fish belong to one bear
     * @return BelongsTo
     */
    public function bear(): BelongsTo
    {
        return $this->belongsTo(Bear::class);
    }
}
