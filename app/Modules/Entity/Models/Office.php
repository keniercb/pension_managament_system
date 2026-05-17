<?php

namespace App\Modules\Entity\Models;

use App\Modules\Common\Models\Municipality;
use App\Modules\Common\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['name', 'address', 'phone', 'province_id', 'municipality_id', 'office_type_id', 'created_by', 'created_at'])]
class Office extends Model
{

    public function municipality(): BelongsTo
    {
        return $this->belongsTo(Municipality::class);
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(OfficeType::class, 'office_type_id');
    }

    public function scopeOfficeType($query, $typeId)
    {
        return $query->where('office_type_id', '=', $typeId);
    }

    public function scopeProvince($query, $provinceId)
    {
        return $query->where('province_id', '=', $provinceId);
    }

    public function scopeMunicipality($query, $municipalityId)
    {
        return $query->where('municipality_id', '=', $municipalityId);
    }
}
