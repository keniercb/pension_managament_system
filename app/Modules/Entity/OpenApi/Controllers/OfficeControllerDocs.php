<?php

namespace App\Modules\Entity\OpenApi\Controllers;

use OpenApi\Attributes\Get;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\RequestBody;
use OpenApi\Attributes\Response;
use OpenApi\Attributes\Tag;

#[Tag(
    name: 'Office',
    description: 'Office Management System API',
)]
abstract class OfficeControllerDocs
{
    #[Get(
        path: '/entities/office-types',
        operationId: 'listOfficeTypes',
        description: 'List of offices types',
        summary: 'Get the list of offices types',
        tags: ['Office'],
        responses: [
            new Response(
                response: 200,
                description: "List of offices types",
                content: new JsonContent(
                    properties: [
                        new Property('data', type: 'array', items: new Items(ref: "#/components/schemas/OfficeTypeResponse"))
                    ],
                    type: 'object'
                )
            ),
            new Response(
                response: 401,
                description: "Unauthenticated",
            )
        ]
    )]
    #[Get(
        path: '/entities/offices',
        operationId: 'getOffices',
        description: 'Retrieve office list by parameters',
        summary: 'Office list by parameters',
        tags: ['Office'],
        responses: [
            new Response(
                response: 200,
                description: 'Operation successful',
                content: new JsonContent(
                    properties: [
                        new Property(property: 'data', type: 'array', items: new Items(ref: "#/components/schemas/OfficeResponse")),
                        new Property(property: 'meta', properties: [
                            new Property(property: 'current_page', type: 'integer'),
                            new Property(property: 'from', type: 'integer'),
                            new Property(property: 'last_page', type: 'integer'),
                            new Property(property: 'per_page', type: 'integer'),
                            new Property(property: 'to', type: 'integer'),
                            new Property(property: 'total', type: 'integer'),
                        ], type: 'object'),
                    ]
                )
            ),
            new Response(
                response: 401,
                description: 'Unauthenticated',
            ),
            new Response(
                response: 422,
                description: 'Validation Error',
            )
        ]
    )]
    #[Post(
        path: '/entities/offices',
        operationId: 'createOffice',
        description: 'Creates an Office',
        summary: 'Creates an Office',
        requestBody: new RequestBody(
            required: true,
            content: new JsonContent(ref: "#/components/schemas/StoreOfficeRequest")
        ),
        tags: ['Office'],
        responses: [
            new Response(
                response: 200,
                description: "Office created successfully"
            ),
            new Response(
                response: 401,
                description: 'Unauthenticated',
            ),
            new Response(
                response: 422,
                description: 'Validation Error',
            ),
        ]
    )]
    abstract public function docs();
}
