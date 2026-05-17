<?php

namespace App\Modules\Entity\OpenApi\Schemas;

use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;

#[Schema(
    schema: "StoreOfficeRequest",
    title: "Store Office Request",
    description: "Store office request payload",
    required: [
        "name", "provinceId", "municipalityId", "officeTypeId"
    ]
)]
abstract class StoreOfficeShema
{
    #[Property(
        property: "name",
        description: "The name of the office",
        type: "string",
    )]
    #[Property(
        property: "provinceId",
        description: "The ID of the province",
        type: "integer",
    )]
    #[Property(
        property: "municipalityId",
        description: "The ID of the municipality",
        type: "integer",
    )]
    #[Property(
        property: "officeTypeId",
        description: "The ID of the office type",
        type: "integer",
    )]
    #[Property(
        property: "address",
        description: "The address of the office",
        type: "string",
    )]
    #[Property(
        property: "phone",
        description: "The phone number of the office",
        type: "string",
    )]
    abstract public function docs();
}
