## Laravel Plugin Manager

> **Warning**
This package is currently still under development. I am revising it daily to get it ready.
> Please dont use it in Production.

## Install the Package
```
composer require noxsi/laravel-plugin-manager:1.0
```

after that:
```
php artisan vendor:publish --provider="Noxsi\LaravelPluginManager\Providers\PluginServiceProvider"
```

Create a Plugin:
```
php artisan make:plugin MY-PLUGIN
```

I will provide more information soon!

## Requirements

- **PHP 8.2**
- **Laravel 10.13**
- **Spatie Enum 3.0**
