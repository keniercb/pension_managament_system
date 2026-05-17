<?php

namespace App\Modules\IAM\OpenApi\Schemas;

use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;

#[Schema(
    schema: "StoreUserRequest",
    title: "Store User Request",
    description: "",
    required: ['name', 'email', 'password', 'password_confirmation'],
)]
abstract class StoreUserShema
{
    #[Property(
        property: "name",
        type: "string",
    )]
    #[Property(
        property: "email",
        type: "string",
    )]
    #[Property(
        property: "password",
        type: "string",
    )]
    #[Property(
        property: "password_confirmation",
        type: "string",
    )]
    abstract public function schema();
}
