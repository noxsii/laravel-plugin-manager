<?php

namespace Noxsi\LaravelPluginManager\Listeners;

use Illuminate\Support\Facades\Artisan;
use Noxsi\LaravelPluginManager\Support\Plugin;

class PluginPublish
{
    public function handle(Plugin $plugin)
    {
        Artisan::call('plugin:publish', ['plugin' => $plugin->getName()]);
    }
}
