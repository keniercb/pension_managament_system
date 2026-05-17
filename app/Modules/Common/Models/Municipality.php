<?php

namespace App\Modules\Common\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['name','code'])]
class Municipality extends Model
{
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
