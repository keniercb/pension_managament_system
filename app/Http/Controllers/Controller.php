<?php

namespace App\Http\Controllers;

use OpenApi\Attributes\Contact;
use OpenApi\Attributes\Info;
use OpenApi\Attributes\Server;

#[Info(
    version: 'v1',
    description: 'Comprehensive API for pension administration, including member enrollment, contribution tracking, benefit calculations, retirement processing, and beneficiary management',
    title: 'Pension Management System API',
    contact: new Contact(
        name: 'Pension Management System API Support',
        email: 'dev@xetid.cu'
    )
)]
#[Server(
    url: '/api/v1/',
)]
abstract class Controller
{

}
