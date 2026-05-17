<?php

namespace App\Modules\Entity\OpenApi\Schemas;

use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;

#[Schema(
    schema: "OfficeTypeResponse",
    title: "Office Type Response",
    description: "Office Type Response",
)]
abstract class OfficeTypeResponseSchema
{
    #[Property(
        property: "id",
        description: "Office Type Id",
        type: 'integer',
    )]
    #[Property(
        property: "name",
        description: "Office Type Name",
        type: 'string',
    )]
    abstract public function schema();
}
