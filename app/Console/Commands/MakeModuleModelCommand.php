<?php

namespace App\Console\Commands;

use App\Core\Traits\GenerateFromStubTrait;
use File;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Str;

#[Signature('module:make-model {module} {model} {--m|migration} {--d|repository} {--l|service} {--c|controller} {--s|seeder}')]
#[Description('Creates a new module model')]
class MakeModuleModelCommand extends Command
{
    use GenerateFromStubTrait;

    /**
     * Execute the console command.
     * @throws FileNotFoundException
     */
    public function handle(): int
    {
        $module = $this->argument('module');
        $model = $this->argument('model');
        $modulePath = app_path('Modules/' . $module);
        if (!File::exists($modulePath)) {
            $this->error('Module ' . $module . ' not found');
            $this->info("Run `php artisan module:create $module` first to create module model");
            return 0;
        }
        /**
         * Creates the model file
         */
        $vars = $this->getModuleVariables($module);
        $this->makeModelClass($modulePath, $model, $vars);
        if ($this->option('migration')) {
            $this->makeMigrationClass($modulePath, $model, $vars);
        }
        if ($this->option('repository')) {
            $this->makeRepositoryClass($modulePath, $model, $vars);
        }
        if ($this->option('service')) {
            $this->makeServiceClass($modulePath, $model, $vars);
        }
        if ($this->option('controller')) {
            $this->makeControllerClass($modulePath, $model, $vars);
        }
        if ($this->option('seeder')) {
            $this->makeSeederClass($modulePath, $model, $vars);
        }
        $this->info("Creating model $model for $module model");

        $this->info('Add this to register method in ' . $module . 'ServiceProvider -> $this->app->bind(' . $model . 'RepositoryInterface::class, ' . $model . 'Repository::class);');
        $this->info('Add this to register method in ' . $module . 'ServiceProvider -> $this->app->bind(' . $model . 'ServiceInterface::class, ' . $model . 'Service::class);');
        return 1;
    }

    /**
     * @throws FileNotFoundException
     */
    private function makeModelClass(string $module, string $model, array $variables): void
    {
        $pascalName = Str::studly(Str::singular($model));
        $variables['modulePascal'] = $pascalName;
        $this->createFromStub("Console/Stubs/module/model.stub", "$module/Models/$pascalName.php", $variables);
    }

    /**
     * @throws FileNotFoundException
     */
    private function makeMigrationClass(string $module, string $model, array $variables): void
    {
        $table = Str::snake(Str::plural($model));
        $variables['table'] = $table;
        $timestamp = now()->format('Y_m_d_His');
        $filename = "$module/Database/Migrations/{$timestamp}_create_{$table}_table.php";
        $this->createFromStub("Console/Stubs/module/migration.stub", $filename, $variables);
    }

    /**
     * @throws FileNotFoundException
     */
    private function makeRepositoryClass(string $module, string $model, array $variables): void
    {
        $pascalName = Str::studly(Str::singular($model));
        $variables['modulePascal'] = $pascalName;
        $this->createFromStub("Console/Stubs/module/repository-contract.stub", "$module/Repositories/Contracts/{$pascalName}RepositoryInterface.php", $variables);
        $this->createFromStub("Console/Stubs/module/repository.stub", "$module/Repositories/{$pascalName}Repository.php", $variables);
    }

    /**
     * @throws FileNotFoundException
     */
    private function makeServiceClass(string $module, string $model, array $variables): void
    {
        $pascalName = Str::studly(Str::singular($model));
        $variables['modulePascal'] = $pascalName;
        $variables['moduleCamel'] = Str::camel($pascalName);
        $this->createFromStub("Console/Stubs/module/service-contract.stub", "$module/Services/Contracts/{$pascalName}ServiceInterface.php", $variables);
        $this->createFromStub("Console/Stubs/module/service.stub", "$module/Services/{$pascalName}Service.php", $variables);
    }

    /**
     * @throws FileNotFoundException
     */
    private function makeControllerClass(string $module, string $model, array $variables): void
    {
        $pascalName = Str::studly(Str::singular($model));
        $variables['modulePascal'] = $pascalName;
        $variables['moduleCamel'] = Str::camel($pascalName);
        $this->createFromStub("Console/Stubs/module/controller.stub", "$module/Http/Controllers/Api/{$pascalName}Controller.php", $variables);
        $this->createFromStub("Console/Stubs/module/resource.stub", "$module/Http/Resources/Api/{$pascalName}Resource.php", $variables);
    }

    /**
     * @throws FileNotFoundException
     */
    private function makeSeederClass(string $module, string $model, array $variables): void
    {
        $pascalName = Str::studly(Str::singular($model));
        $variables['modulePascal'] = $pascalName;
        $this->createFromStub("Console/Stubs/module/seeder.stub", "$module/Database/Seeders/{$pascalName}DatabaseSeeder.php", $variables);
    }
}
