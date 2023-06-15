<?php

namespace Noxsi\LaravelPluginManager\Providers;

use Carbon\Laravel\ServiceProvider;
use Noxsi\LaravelPluginManager\Contracts\RepositoryInterface;
use Noxsi\LaravelPluginManager\Support\Repositories\FileRepository;

class ContractsServiceProvider extends ServiceProvider
{
    /**
     * Register some binding.
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, FileRepository::class);
    }
}
