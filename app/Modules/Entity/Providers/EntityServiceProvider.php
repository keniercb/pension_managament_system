<?php

namespace App\Modules\Entity\Providers;

use App\Modules\Entity\Repositories\Contracts\OfficeRepositoryInterface;
use App\Modules\Entity\Repositories\Contracts\OfficeTypeRepositoryInterface;
use App\Modules\Entity\Repositories\OfficeRepository;
use App\Modules\Entity\Repositories\OfficeTypeRepository;
use App\Modules\Entity\Services\Contracts\OfficeServiceInterface;
use App\Modules\Entity\Services\Contracts\OfficeTypeServiceInterface;
use App\Modules\Entity\Services\OfficeService;
use App\Modules\Entity\Services\OfficeTypeService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class EntityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(OfficeTypeRepositoryInterface::class, OfficeTypeRepository::class);
        $this->app->bind(OfficeTypeServiceInterface::class, OfficeTypeService::class);
        $this->app->bind(OfficeRepositoryInterface::class, OfficeRepository::class);
        $this->app->bind(OfficeServiceInterface::class, OfficeService::class);
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

        if (file_exists($routesPath)) {
            Route::prefix('api/v1/entities')
                //->middleware(['api', 'auth:sanctum'])
                ->group($routesPath);
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
