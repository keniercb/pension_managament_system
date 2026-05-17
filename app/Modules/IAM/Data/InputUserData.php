<?php

namespace App\Modules\IAM\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use App\Modules\IAM\Http\Requests\StoreUserRequest;

#[MapInputName(SnakeCaseMapper::class)]
#[MapOutputName(SnakeCaseMapper::class)]
class InputUserData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    )
    {
    }

    public static function fromRequest(StoreUserRequest $request)
    {
        return self::from($request->validated());
    }
}
