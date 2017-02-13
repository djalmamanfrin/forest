<?php

declare(strict_types = 1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Bear
 * @package App
 */
class Bear extends Model
{
    public function fishes(): BelongsTo
    {
        return $this->belongsTo(Fish::class);
    }

    public function trees(): BelongsTo
    {
        return $this->belongsTo(Tree::class);
    }

    public function picnics(): BelongsToMany
    {
        return $this->belongsToMany(Picnic::class)->withPivot(['created_at', 'updated_at']);
    }
}
