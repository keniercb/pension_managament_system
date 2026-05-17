<?php

namespace App\Core\Traits;

use File;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Str;

trait GenerateFromStubTrait
{
    /**
     * @throws FileNotFoundException
     */
    private function createFromStub(string $stub, string $path, array $vars): void
    {
        $stubPath = app_path($stub);
        $content = File::get($stubPath);
        $content = $this->replaceVars($content, $vars);
        $directory = dirname($path);
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true);
        }
        File::put($path, $content);
    }

    private function replaceVars(string $content, array $vars): string
    {
        foreach ($vars as $key => $value) {
            $content = str_replace("{{{$key}}}", $value, $content);
        }
        return $content;
    }

    protected function getModuleVariables(string $moduleName): array
    {
        return [
            'moduleName' => $moduleName,
            'moduleLower' => Str::lower($moduleName),
            'modulePlural' => Str::plural(Str::lower($moduleName)),
            'moduleSnake' => Str::snake($moduleName),
            'moduleKebab' => Str::kebab($moduleName),
            'moduleCamel' => Str::camel($moduleName),
            'modulePascal' => Str::studly($moduleName),
            'namespace' => "App\\Modules\\{$moduleName}",
        ];
    }
}
