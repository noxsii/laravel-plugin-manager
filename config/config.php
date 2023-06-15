<?php

return [

    'namespace' => 'Plugins',

    'market' => [

        'api_base' => 'https://plugin.noxsi.de',
        'default' => \Noxsi\LaravelPluginManager\Support\Client\Market::class,
    ],

    'stubs' => [
        'enabled' => false,
        'files'   => [
            'routes/web'      => 'Routes/web.php',
            'routes/api'      => 'Routes/api.php',
            'views/index'     => 'Resources/views/index.blade.php',
            'views/master'    => 'Resources/views/layouts/master.blade.php',
            'scaffold/config'  => 'Config/config.php',
            'assets/js/app'   => 'Resources/assets/js/app.js',
            'assets/sass/app' => 'Resources/assets/sass/app.scss',
            'webpack'         => 'webpack.mix.js',
            'package'         => 'package.json',
            'gitignore'       => '.gitignore',
        ],
        'replacements' => [
            'routes/web'      => ['LOWER_NAME', 'STUDLY_NAME'],
            'routes/api'      => ['LOWER_NAME'],
            'json'            => ['LOWER_NAME', 'STUDLY_NAME', 'PLUGIN_NAMESPACE', 'PROVIDER_NAMESPACE'],
            'views/index'     => ['LOWER_NAME'],
            'views/master'    => ['LOWER_NAME', 'STUDLY_NAME'],
            'scaffold/config'  => ['STUDLY_NAME'],
            'webpack'         => ['LOWER_NAME'],
        ],
        'gitkeep' => true,
    ],
    'paths' => [

        'plugins' => base_path('plugins'),

        'assets' => public_path('plugins'),

        'generator' => [
            'config'      => ['path' => 'Config', 'generate' => true],
            'seeder'     => ['path' => 'Database/Seeders', 'generate' => true],
            'migration'  => ['path' => 'Database/Migrations', 'generate' => true],
            'routes'     => ['path' => 'Routes', 'generate' => true],
            'controller' => ['path' => 'Http/Controllers', 'generate' => true],
            'provider'   => ['path' => 'Providers', 'generate' => true],
            'assets'     => ['path' => 'Resources/assets', 'generate' => true],
            'lang'       => ['path' => 'Resources/lang', 'generate' => true],
            'views'      => ['path' => 'Resources/views', 'generate' => true],
            'model'      => ['path' => 'Models', 'generate' => true],
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
        'enabled'  => false,
        'key'      => 'laravel-plugin-manager',
        'lifetime' => 60,
    ],
    'register' => [
        'translations' => true,
        'files' => 'register',
    ],

    'activators' => [
        'file' => [
            'class'          => \Noxsi\LaravelPluginManager\Activators\FileActivator::class,
            'statuses-file'  => base_path('plugin_statuses.json'),
            'cache-key'      => 'activator.installed',
            'cache-lifetime' => 604800,
        ],
    ],

    'activator' => 'file',

];
