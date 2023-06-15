<?php

namespace Noxsi\LaravelPluginManager\Providers;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Str;
use Noxsi\LaravelPluginManager\Console\Commands\ComposerInstallCommand;
use Noxsi\LaravelPluginManager\Console\Commands\ComposerRemoveCommand;
use Noxsi\LaravelPluginManager\Console\Commands\ComposerRequireCommand;
use Noxsi\LaravelPluginManager\Console\Commands\ControllerMakeCommand;
use Noxsi\LaravelPluginManager\Console\Commands\DisableCommand;
use Noxsi\LaravelPluginManager\Console\Commands\DownLoadCommand;
use Noxsi\LaravelPluginManager\Console\Commands\EnableCommand;
use Noxsi\LaravelPluginManager\Console\Commands\InstallCommand;
use Noxsi\LaravelPluginManager\Console\Commands\ListCommand;
use Noxsi\LaravelPluginManager\Console\Commands\LoginCommand;
use Noxsi\LaravelPluginManager\Console\Commands\MigrateCommand;
use Noxsi\LaravelPluginManager\Console\Commands\MigrationMakeCommand;
use Noxsi\LaravelPluginManager\Console\Commands\ModelMakeCommand;
use Noxsi\LaravelPluginManager\Console\Commands\PluginCommand;
use Noxsi\LaravelPluginManager\Console\Commands\PluginDeleteCommand;
use Noxsi\LaravelPluginManager\Console\Commands\PluginMakeCommand;
use Noxsi\LaravelPluginManager\Console\Commands\ProviderMakeCommand;
use Noxsi\LaravelPluginManager\Console\Commands\PublishCommand;
use Noxsi\LaravelPluginManager\Console\Commands\RegisterCommand;
use Noxsi\LaravelPluginManager\Console\Commands\RouteProviderMakeCommand;
use Noxsi\LaravelPluginManager\Console\Commands\SeedMakeCommand;
use Noxsi\LaravelPluginManager\Console\Commands\UploadCommand;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Namespace of the console commands.
     *
     * @var string
     */
    protected string $consoleNamespace = 'Yxx\\LaravelPlugin\\Console\\Commands';

    /**
     * The available commands.
     *
     * @var array
     */
    protected array $commands = [
        PluginCommand::class,
        PluginMakeCommand::class,
        ProviderMakeCommand::class,
        RouteProviderMakeCommand::class,
        ControllerMakeCommand::class,
        ModelMakeCommand::class,
        MigrationMakeCommand::class,
        MigrateCommand::class,
        SeedMakeCommand::class,
        ComposerRequireCommand::class,
        ComposerRemoveCommand::class,
        ComposerInstallCommand::class,
        ListCommand::class,
        DisableCommand::class,
        EnableCommand::class,
        PluginDeleteCommand::class,
        InstallCommand::class,
        PublishCommand::class,
        RegisterCommand::class,
        LoginCommand::class,
        UploadCommand::class,
        DownLoadCommand::class,

    ];

    /**
     * @return array
     */
    private function resolveCommands(): array
    {
        $commands = [];

        foreach ((config('plugins.commands') ?: $this->commands) as $command) {
            $commands[] = Str::contains($command, $this->consoleNamespace) ?
                $command :
                $this->consoleNamespace.'\\'.$command;
        }

        return $commands;
    }

    public function register(): void
    {
        $this->commands($this->resolveCommands());
    }

    /**
     * @return array
     */
    public function provides(): array
    {
        return $this->commands;
    }
}
