<?php

return [

    'namespace' => 'Plugins',

    'market' => [

        'api_base' => 'https://plugin.noxsi.de',
        'default' => \Noxsi\LaravelPluginManager\Support\Client\Market::class,
    ],

    'stubs' => [
        'enabled' => false,
        'files' => [
            'routes/web' => 'routes/web.php',
            'routes/api' => 'routes/api.php',
            'views/index' => 'resources/views/index.blade.php',
            'views/master' => 'resources/views/layouts/master.blade.php',
            'scaffold/config' => 'config/config.php',
            'js/app' => 'resources/js/app.js',
            'css/app' => 'resources/css/app.css',
            'vite' => 'vite.config.js',
            'package' => 'package.json',
            'gitignore' => '.gitignore',
        ],
        'replacements' => [
            'routes/web' => ['LOWER_NAME', 'STUDLY_NAME'],
            'routes/api' => ['LOWER_NAME'],
            'json' => ['LOWER_NAME', 'STUDLY_NAME', 'PLUGIN_NAMESPACE', 'PROVIDER_NAMESPACE'],
            'views/index' => ['LOWER_NAME'],
            'views/master' => ['LOWER_NAME', 'STUDLY_NAME'],
            'scaffold/config' => ['STUDLY_NAME'],
            'vite' => ['LOWER_NAME'],
        ],
        'gitkeep' => true,
    ],
    'paths' => [

        'plugins' => base_path('plugins'),

        'assets' => public_path('plugins'),

        'generator' => [
            'config' => ['path' => 'config', 'generate' => true],
            'seeder' => ['path' => 'database/seeders', 'generate' => true],
            'migration' => ['path' => 'database/migrations', 'generate' => true],
            'routes' => ['path' => 'routes', 'generate' => true],
            'controller' => ['path' => 'Http/Controllers', 'generate' => true],
            'provider' => ['path' => 'Providers', 'generate' => true],
            'js' => ['path' => 'resources/js', 'generate' => true],
            'css' => ['path' => 'resources/css', 'generate' => true],
            'lang' => ['path' => 'resources/lang', 'generate' => true],
            'views' => ['path' => 'resources/views', 'generate' => true],
            'model' => ['path' => 'Models', 'generate' => true],
        ],
    ],

    'listen' => [
        'plugins.installed' => [
            \Noxsi\LaravelPluginManager\Listeners\PluginPublish::class,
            \Noxsi\LaravelPluginManager\Listeners\PluginMigrate::class,
        ],
        'plugins.disabling' => [],

        'plugins.disabled' => [],

        'plugins.enabling' => [],

        'plugins.enabled' => [],

        'plugins.deleting' => [],

        'plugins.deleted' => [],
    ],

    'commands' => [],

    'cache' => [
        'enabled' => false,
        'key' => 'laravel-plugin-manager',
        'lifetime' => 60,
    ],
    'register' => [
        'translations' => true,
        'files' => 'register',
    ],

    'activators' => [
        'file' => [
            'class' => \Noxsi\LaravelPluginManager\Activators\FileActivator::class,
            'statuses-file' => base_path('plugin_statuses.json'),
            'cache-key' => 'activator.installed',
            'cache-lifetime' => 604800,
        ],
    ],

    'activator' => 'file',

];
