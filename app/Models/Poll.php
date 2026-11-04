<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Poll extends Model
{
    /**
     * Define Poll-Options relationship.
     *
     * @return HasMany<Option, $this>
     */
    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }
}
