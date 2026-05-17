<?php

namespace App\Modules\IAM\Providers;

use App\Modules\IAM\Repositories\Contracts\UserRepositoryInterface;
use App\Modules\IAM\Repositories\UserRepository;
use App\Modules\IAM\Services\AuthService;
use App\Modules\IAM\Services\Contracts\AuthServiceInterface;
use App\Modules\IAM\Services\Contracts\UserServiceInterface;
use App\Modules\IAM\Services\UserService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class IAMServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutes();
        $this->loadMigrations();
    }

    /**
     * Load Module Routes
     */
    protected function loadRoutes(): void
    {
        $routesPath = __DIR__ . '/../Routes/api.php';
        $authRoutesPath = __DIR__ . '/../Routes/auth.php';

        if (file_exists($routesPath)) {
            Route::prefix('api/v1/iam')
                ->middleware(['api', 'auth:sanctum'])
                ->group($routesPath);
        }

        if (file_exists($authRoutesPath)) {
            Route::prefix('api/v1/auth')
                ->group($authRoutesPath);
        }
    }

    /**
     * Loads all module migrations
     */
    protected function loadMigrations(): void
    {
        $migrationsPath = __DIR__ . '/../Database/Migrations';

        if (is_dir($migrationsPath)) {
            $this->loadMigrationsFrom($migrationsPath);
        }
    }
}
