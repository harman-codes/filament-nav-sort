<?php

namespace Harman\FilamentNavSort;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentNavSortServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-nav-sort')
            ->hasConfigFile();
    }

    public function packageBooted(): void
    {
        $this->publishes([
            $this->package->basePath('/../config/filament-nav-sort-config.php') => config_path('filament-nav-sort-config.php'),
        ]);
    }
}
