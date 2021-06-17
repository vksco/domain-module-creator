<?php

namespace Vksco\DomainModuleCreator;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Vksco\DomainModuleCreator\Commands\ModuleCreate;

class DomainModuleCreatorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('domain-module-creator')
            ->hasConfigFile()
            ->hasCommand(ModuleCreate::class);
    }

    public function bootingPackage()
    {
        // Load views.
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'module-interface');
    }

    public function registeringPackage()
    {
        $this->app->singleton('Request', \Vksco\DomainModuleCreator\Request\Request::class);

        $this->app->singleton('Datasystem', function ($app) {
            return new \Vksco\DomainModuleCreator\Datasystem\Datasystem($app->make('Request')->getRequest());
        });

        $this->app->singleton('Parser', function ($app) {
            return new \Vksco\DomainModuleCreator\Parsers\Parser($app->make('Request')->getRequest());
        });

        $this->app->singleton('Path', \Vksco\DomainModuleCreator\Filesystem\Path::class);

        $this->app->singleton('Generator', \Vksco\DomainModuleCreator\Generators\Generator::class);

        $this->app->singleton('ModelGenerate', \Vksco\DomainModuleCreator\Generators\ModelGenerate::class);

        $this->app->singleton('EventGenerate', \Vksco\DomainModuleCreator\Generators\EventGenerate::class);

        $this->app->singleton('ListenerGenerator', \Vksco\DomainModuleCreator\Generators\ListenerGenerator::class);

        $this->app->singleton('NotificationGenerator', \Vksco\DomainModuleCreator\Generators\NotificationGenerator::class);

        $this->app->singleton('ObserverGenerator', \Vksco\DomainModuleCreator\Generators\ObserverGenerator::class);

        $this->app->singleton('ServiceGenerator', \Vksco\DomainModuleCreator\Generators\ServiceGenerator::class);

        $this->app->singleton('RouteGenerator', \Vksco\DomainModuleCreator\Generators\RouteGenerator::class);

        $this->app->singleton('ControllerGenerator', \Vksco\DomainModuleCreator\Generators\ControllerGenerator::class);

        $this->app->singleton('RequestsGenerator', \Vksco\DomainModuleCreator\Generators\RequestsGenerator::class);

        $this->app->singleton('MigartionGenerator', \Vksco\DomainModuleCreator\Generators\MigartionGenerator::class);
    }
}
