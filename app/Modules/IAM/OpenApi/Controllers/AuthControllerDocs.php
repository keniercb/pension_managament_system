<?php

namespace App\Modules\IAM\OpenApi\Controllers;

use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\RequestBody;
use OpenApi\Attributes\Response;
use OpenApi\Attributes\Tag;

#[Tag(
    name: 'Authorization',
    description: 'Authorization API',
)]
abstract class AuthControllerDocs
{
    #[Post(
        path: '/auth/login',
        operationId: 'login',
        description: 'Login user',
        requestBody: new RequestBody(
            content: new JsonContent(
                ref: '#/components/schemas/AuthRequest'
            )
        ),
        tags: ['Authorization'], responses: [
        new Response(
            response: 200,
            description: 'Login user successfully',
            content: new JsonContent(
                ref: '#/components/schemas/AuthResponse'
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
        path: '/auth/logout',
        operationId: 'logout',
        description: 'Logout user',
        tags: ['Authorization'],
        responses: [
            new Response(
                response: 200,
                description: 'User logged out successfully'
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
    abstract public function docs();
}
