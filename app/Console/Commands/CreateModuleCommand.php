<?php

namespace App\Console\Commands;

use App\Core\Traits\GenerateFromStubTrait;
use File;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

#[Signature('module:create {module}')]
#[Description('Creates a new module under Modules folder.')]
class CreateModuleCommand extends Command
{
    use GenerateFromStubTrait;

    /**
     * Execute the console command.
     * @throws FileNotFoundException
     */
    public function handle()
    {
        $name = $this->argument('module');
        $path = app_path("Modules/{$name}");
        if (File::exists($path)) {
            $this->error("Module with name '{$name}' already exists!");
        }
        $this->createModuleStructure($path);
        $this->createModuleComponents($path, $this->getModuleVariables($name));
        $this->info("Creating module $name");
        $this->info("Add this line to providers array in bootstrap/providers.php -> {$name}ServiceProvider::class");

    }

    private function createModuleStructure(string $path): void
    {
        $directories = [
            'Http/Controllers/Api',
            'Http/Middleware',
            'Http/Requests',
            'Http/Resources/Api',
            'Repositories/Contracts',
            'Services/Contracts',
            'Models',
            'Domain',
            'Providers',
            'Data',
            'Database/Migrations',
            'Database/Seeders',
            'Routes',
            'OpenApi/Schemas',
            'OpenApi/Responses',
            'OpenApi/Controllers',
        ];
        foreach ($directories as $directory) {
            $fullPath = $path . DIRECTORY_SEPARATOR . $directory;
            File::makeDirectory($fullPath, $mode = 0775, true, true);
            $this->info("Creating directory $fullPath with permissions 0775");
        }
    }

    /**
     * @throws FileNotFoundException
     */
    public function createModuleComponents(string $path, array $vars): void
    {
        $pascalName = $vars['modulePascal'];
        $components = [
            'Routes' => [
                'stub' => "Console/Stubs/module/routes.stub",
                'path' => $path . "/Routes/api.php"
            ],
            'Service Provider' => [
                'stub' => "Console/Stubs/module/service-provider.stub",
                'path' => $path . "/Providers/{$pascalName}ServiceProvider.php"
            ],
            'Seeder' => [
                'stub' => "Console/Stubs/module/seeder.stub",
                'path' => $path . "/Database/Seeders/{$pascalName}DatabaseSeeder.php"
            ]
        ];
        foreach ($components as $key => $value) {
            $this->createFromStub($value['stub'], $value['path'], $vars);
            $this->info($key . ' was created! at ' . $value['path']);
        }
    }
}
