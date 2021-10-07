This package adds an admin panel to your app. 

## Installation
`composer require nanuc/laravel-admin`

#### Publish config
` php artisan vendor:publish --provider="Nanuc\LaravelAdmin\LaravelAdminServiceProvider" --tag=config`

This package assumes you want to access your admin panel at `/admin` and have a route `dashboard` (to return to from the admin panel). You can setup change this values in the config.

You can enable/disable modules in the `modules` parameter. You can add own modules too - see "Customization".

#### Edit .env
Add the user accounts that are supposed to be admins to your .env.
`ADMINS=user1@example.com,user2@example.com`

#### Impersonation
Add the trait `Nanuc\LaravelAdmin\Traits\InteractsWithAdmin` to your User model.

## Usage
#### Link to admin area
Place a link to the route `admin.home` somewhere in your navigation. Make sure that only admins will see it.

If you use Jetstream you can use `<x-admin::admin-link/>` and `<x-admin::admin-link-responsive/>` in your dropdown navigation menus. Only admins will see it by default.

#### Impersonation information
Add `<x-admin::impersonation/>` to the top of your layout to show information about who is being impersonated.

#### Blade views
You can use the `@admin` directive in your blade views.
```
@admin
    Only admins can see this.
@endadmin
```

## Customization
#### Custom Modules
You can create own modules that will appear in the navigation. You have to create a class that extends `Nanuc\LaravelAdmin\Modules\AdminModule`. See how `Nanuc\LaravelAdmin\Modules\Users\Users` is built and start from there.

#### Custom CSS/JS
To import your own CSS/JS go to your laravel-admin config.
```
'styles' => [
    asset('path/to/your/custom.css')
],
'scripts' => [
    asset('path/to/your/custom.js')
],