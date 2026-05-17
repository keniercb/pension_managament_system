<?php

namespace App\Modules\IAM\OpenApi\Schemas;

use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;

#[Schema(
    schema: 'AuthResponse',
    title: 'Login user response',
)]
abstract class AuthResponseSchema
{
    #[Property(
        property: 'id',
        title: 'User ID',
        type: 'integer',
    )]
    #[Property(
        property: 'name',
        title: 'User name',
        type: 'string',
    )]
    #[Property(
        property: 'email',
        title: 'User email',
        type: 'string',
    )]
    #[Property(
        property: 'token',
        title: 'User authentication token',
        type: 'string',
    )]
    abstract public function schema();
}
