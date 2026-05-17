<?php

namespace App\Modules\Entity\Data;

use App\Modules\Entity\Http\Requests\StoreOfficeRequest;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Symfony\Contracts\Service\Attribute\Required;

#[MapInputName(SnakeCaseMapper::class)]
#[MapOutputName(SnakeCaseMapper::class)]
class StoreOfficeData extends Data
{
    public function __construct(
        public string $name,
        public string $address = '',
        public int    $provinceId,
        public int    $municipalityId,
        public int    $officeTypeId,
        public string $phone = '',
    )
    {
    }

    public static function fromRequest(StoreOfficeRequest $request)
    {
        return self::from($request->validated());
    }

}
