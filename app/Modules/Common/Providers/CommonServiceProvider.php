<?php

namespace App\Modules\Common\Providers;

use App\Modules\Common\Repositories\Contracts\MinistryRepositoryInterface;
use App\Modules\Common\Repositories\Contracts\MunicipalityRepositoryInterface;
use App\Modules\Common\Repositories\Contracts\ProvinceRepositoryInterface;
use App\Modules\Common\Repositories\MinistryRepository;
use App\Modules\Common\Repositories\MunicipalityRepository;
use App\Modules\Common\Repositories\ProvinceRepository;
use App\Modules\Common\Services\Contracts\MinistryServiceInterface;
use App\Modules\Common\Services\Contracts\MunicipalityServiceInterface;
use App\Modules\Common\Services\Contracts\ProvinceServiceInterface;
use App\Modules\Common\Services\MinistryService;
use App\Modules\Common\Services\MunicipalityService;
use App\Modules\Common\Services\ProvinceService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class CommonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MunicipalityServiceInterface::class, MunicipalityService::class);
        $this->app->bind(MunicipalityRepositoryInterface::class, MunicipalityRepository::class);
        $this->app->bind(ProvinceRepositoryInterface::class, ProvinceRepository::class);
        $this->app->bind(ProvinceServiceInterface::class, ProvinceService::class);
        $this->app->bind(MinistryRepositoryInterface::class, MinistryRepository::class);
        $this->app->bind(MinistryServiceInterface::class, MinistryService::class);
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
            Route::prefix('api/v1/commons')
                ->middleware(['api', 'auth:sanctum'])
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
