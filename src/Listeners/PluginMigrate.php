<?php

namespace Noxsi\LaravelPluginManager\Listeners;

use Illuminate\Support\Facades\Artisan;
use Noxsi\LaravelPluginManager\Support\Plugin;

class PluginMigrate
{
    public function handle(Plugin $plugin)
    {
        Artisan::call('plugin:migrate', ['plugin' => $plugin->getName()]);
    }
}
