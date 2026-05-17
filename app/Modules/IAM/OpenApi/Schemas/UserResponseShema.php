<?php

namespace App\Modules\IAM\OpenApi\Schemas;

use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;

#[Schema(
    schema: 'UserResponse',
    title: 'User Response Data',
    description: 'User Response Data',
)]
abstract class UserResponseShema
{
    #[Property(
        property: 'id',
        type: 'integer'
    )]
    #[Property(
        property: 'name',
        type: 'string'
    )]
    #[Property(
        property: 'email',
        type: 'string'
    )]
    public abstract function schema();
}
