<?php

namespace App\Modules\Common\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'code', 'abbreviation'])]
class Province extends Model
{

    public function municipalities(): HasMany
    {
        return $this->hasMany(Municipality::class);
    }
}
