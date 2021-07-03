<?php

namespace Bildvitta\IssProduto;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

/**
 * Class IssProdutoServiceProvider.
 *
 * @package Bildvitta\IssProduto
 */
class IssProdutoServiceProvider extends PackageServiceProvider
{
    /**
     * @param  Package  $package
     */
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('iss-produto')
            ->hasConfigFile();
    }
}
