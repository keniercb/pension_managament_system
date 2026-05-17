<?php

namespace App\Modules\Entity\OpenApi\Schemas;

use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;

#[Schema(
    schema: "OfficeResponse",
    title: "Office Response",
    description: "Office Response",
)]
abstract class OfficeResponseSchema
{
    #[Property(
        property: "id",
        type: "integer",
    )]
    #[Property(
        property: "name",
        type: "string",
    )]
    #[Property(
        property: "address",
        type: "string",
    )]
    #[Property(
        property: "phone",
        type: "string",
    )]
    #[Property(
        property: "province",
        type: "integer",
    )]
    #[Property(
        property: "municipality",
        type: "integer",
    )]
    #[Property(
        property: "type",
        type: "string",
    )]
    abstract public function schema();
}
