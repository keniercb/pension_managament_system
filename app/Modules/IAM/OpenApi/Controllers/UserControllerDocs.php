<?php


namespace App\Modules\IAM\OpenApi\Controllers;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\RequestBody;
use OpenApi\Attributes\Response;
use OpenApi\Attributes\Tag;

#[Tag(
    name: 'User',
    description: 'User API'
)]
abstract class UserControllerDocs
{
    #[Get(
        path: '/iam/users',
        operationId: 'getUsers',
        description: 'Return all users by params',
        tags: ['User'],
        responses: [new Response(
            response: 200,
            description: 'Operation successful',
            content: new JsonContent(
                properties: [new Property(property: 'data', type: 'array', items: new Items(ref: "#/components/schemas/UserResponse")),
                    new Property(property: 'meta', properties: [new Property(property: 'current_page', type: 'integer'),
                        new Property(property: 'from', type: 'integer'),
                        new Property(property: 'last_page', type: 'integer'),
                        new Property(property: 'per_page', type: 'integer'),
                        new Property(property: 'to', type: 'integer'),
                        new Property(property: 'total', type: 'integer'),], type: 'object'),]
            )
        ),
            new Response(
                response: 401,
                description: 'Unauthorized',
            ),
            new Response(
                response: 422,
                description: 'Validation Error',
            )]
    )]
    #[Post(
        path: '/iam/users',
        operationId: 'createUser',
        description: 'Create new user',
        requestBody: new RequestBody(
            required: true,
            content: new JsonContent(
                ref: "#/components/schemas/StoreUserRequest"
            )
        ),
        tags: ['User'],
        responses: [
            new Response(
                response: 200,
                description: 'Created user successfully',
                content: new JsonContent(
                    ref: '#/components/schemas/UserResponse'
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
    public abstract function docs();
}
