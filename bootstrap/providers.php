<?php

use App\Modules\Common\Providers\CommonServiceProvider;
use App\Modules\Entity\Providers\EntityServiceProvider;
use App\Modules\IAM\Providers\IAMServiceProvider;
use App\Providers\AppServiceProvider;

return [
    AppServiceProvider::class,
    CommonServiceProvider::class,
    EntityServiceProvider::class,
    IAMServiceProvider::class
];
