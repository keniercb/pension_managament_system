<?php

namespace App\Modules\IAM\Data;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\CamelCaseMapper;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapOutputName(SnakeCaseMapper::class)]
class AuthUserData extends Data
{
    public function __construct(
        public int    $id,
        public string $username,
        public string $email,
        public string $token,
    )
    {
    }
}
