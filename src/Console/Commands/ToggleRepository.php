<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */
namespace Mlbrgn\LaravelFormComponents\Console\Commands;;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;

class ToggleRepository extends Command
{
    protected $signature = 'laravel-form-components:toggle-repository {--force : Skip confirmation prompts}';

    protected $description = 'Toggle between local and Packagist repositories for development packages. Manages symlinks, composer require versions, and runs composer update.';

    protected array $packages = [
        'mlbrgn/laravel-form-components' => [
            'path' => './packages/mlbrgn/laravel-form-components',
            'symlink' => 'laravel-form-components',
        ],
        // Add more packages here if needed
    ];

    public function handle(): int
    {
        $composerPath = base_path('composer.json');

        if (! file_exists($composerPath)) {
            $this->error('composer.json not found!');
            return self::FAILURE;
        }

        $composer = json_decode(file_get_contents($composerPath), true);
        $repositories = $composer['repositories'] ?? [];
        $originalRequires = $composer['extra']['original_require'] ?? [];

        $toggled = [];

        foreach ($this->packages as $name => $data) {
            $pathRepo = $data['path'];
            $symlinkName = $data['symlink'];
            $targetPath = realpath(base_path(trim($pathRepo, './') . '/dist'));

            $isLinked = collect($repositories)->contains(fn ($repo) => ($repo['type'] ?? '') === 'path' && ($repo['url'] ?? '') === $pathRepo);

            if ($isLinked) {
                if (! $this->option('force') && ! $this->confirm("Remove local path for [$name]?")) {
                    continue;
                }

                // Clean vendor package folder
                $this->cleanVendorPackage($name);

                // Clean published views folder
                $this->cleanPublishedViews();

                // Remove from repositories
                $repositories = array_values(array_filter($repositories, fn ($repo) => ! ($repo['type'] === 'path' && $repo['url'] === $pathRepo)));

                // Remove symlink
                $this->removeSymlink($name, $symlinkName);

                $this->info("🔗 Removed local path for $name");

                // Restore the original version if saved
                if (isset($originalRequires[$name])) {
                    $composer['require'][$name] = $originalRequires[$name];
                    unset($composer['extra']['original_require'][$name]);
                    $this->info("🔁 Restored version for $name to {$composer['require'][$name]}");
                } else {
                    $this->warn("⚠️ No stored original version for $name; leaving as-is.");
                }

                $toggled[] = $name;
            } else {
                if (! $this->option('force') && ! $this->confirm("Use local path for [$name]?")) {
                    continue;
                }

                // Clean vendor package folder
                $this->cleanVendorPackage($name);

                // Clean published views folder
                $this->cleanPublishedViews();

                // Add to repositories
                $repositories[] = [
                    'type' => 'path',
                    'url' => $pathRepo,
                    'options' => ['symlink' => true],
                ];

                // Save the current version before switching
                $currentVersion = $composer['require'][$name] ?? null;
                if ($currentVersion && $currentVersion !== 'dev-main') {
                    if (! isset($composer['extra']['original_require'][$name])) {
                        $composer['extra']['original_require'][$name] = $currentVersion;
                        $this->info("💾 Saved original version for $name: $currentVersion");
                    } else {
                        $this->line("ℹ️ Skipping saving original version for $name; already saved as {$composer['extra']['original_require'][$name]}");
                    }
                }

                // Set version to dev-main
                $composer['require'][$name] = 'dev-main';
                $this->info("🔖 Set version for $name to dev-main");

                if (! $targetPath || ! is_dir($targetPath)) {
                    $this->warn("⚠️ dist folder not found for $name, skipping symlink.");
                } else {
                    $this->createSymlink($name, $symlinkName, $targetPath);
                }

                $toggled[] = $name;
            }
        }

        $composer['repositories'] = $repositories;

        // Clean up original_require if empty
        if (empty($composer['extra']['original_require'] ?? [])) {
            unset($composer['extra']['original_require']);
        }

        // Write updated composer.json BEFORE running composer update
        file_put_contents($composerPath, json_encode($composer, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        if (count($toggled)) {
            $this->info('📦 Running composer update for: '.implode(', ', $toggled));
            $process = Process::fromShellCommandline('composer update '.implode(' ', $toggled));
            $process->setTty(Process::isTtySupported());
            $process->run(function ($type, $buffer) {
                echo $buffer;
            });
        } else {
            $this->info('✅ Nothing to update.');
        }

        return self::SUCCESS;
    }

    protected function createSymlink(string $packageName, string $symlinkName, string $targetPath): void
    {
        $vendorNamespace = explode('/', $packageName)[0]; // 'mlbrgn'
        $parentDir = public_path('vendor/'.$vendorNamespace);

        if (! is_dir($parentDir)) {
            mkdir($parentDir, 0755, true);
        }

        $linkPath = $parentDir.'/'.$symlinkName;

        $this->removePath($linkPath);

        symlink($targetPath, $linkPath);
        $this->info("🔗 Created symlink: $linkPath → $targetPath");
    }

    protected function removeSymlink(string $packageName, string $symlinkName): void
    {
        $vendorNamespace = explode('/', $packageName)[0];
        $linkPath = public_path('vendor/'.$vendorNamespace.'/'.$symlinkName);
        $this->removePath($linkPath);
    }

    protected function removePath(string $path): void
    {
        if (is_link($path)) {
            File::delete($path);
            $this->info("🗑 Removed symlink: $path");
        } elseif (is_dir($path)) {
            File::deleteDirectory($path);
            $this->info("🗑 Removed directory: $path");
        } elseif (file_exists($path)) {
            File::delete($path);
            $this->info("🗑 Removed file: $path");
        }
    }

    protected function cleanVendorPackage(string $name): void
    {
        $vendorPath = base_path('vendor/' . str_replace('/', DIRECTORY_SEPARATOR, $name));
        if (is_link($vendorPath) || is_dir($vendorPath) || file_exists($vendorPath)) {
            $this->removePath($vendorPath);
            $this->info("🧹 Cleaned vendor package directory: $vendorPath");
        }
    }

    protected function cleanPublishedViews(): void
    {
        $viewsPath = resource_path('views/vendor/laravel-form-components');
        if (is_dir($viewsPath)) {
            File::deleteDirectory($viewsPath);
            $this->info("🧹 Cleaned published views directory: $viewsPath");
        }
    }
}
