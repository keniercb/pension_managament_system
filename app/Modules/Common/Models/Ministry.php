<?php

namespace App\Modules\Common\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'abbreviation', 'description', 'created_at', 'created_by'])]
class Ministry extends Model
{
    public function scopeFilter($query, string $filter)
    {
        return $query->where('name', 'like', '%' . $filter . '%')
            ->orWhere('abbreviation', 'like', '%' . $filter . '%');
    }
}
