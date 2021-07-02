<?php

namespace Bildvitta\IssProduto;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Bildvitta\IssProduto\Commands\IssProdutoCommand;

class IssProdutoServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('iss-produto')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_iss-produto_table')
            ->hasCommand(IssProdutoCommand::class);
    }
}
