<?php

namespace App\Modules\IAM\OpenApi\Schemas;

use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;

#[Schema(
    schema: 'AuthRequest',
    required: ['email', 'password']
)]
abstract class AuthRequestSchema
{
    #[Property(
        property: 'email',
        type: 'string',
    )]
    #[Property(
        property: 'password',
        type: 'string',
    )]
    abstract public function schema();
}
