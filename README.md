# Laravel Sift
A Laravel 5 package for Sift Science

## Installation

Install the package using Composer
```
composer require suth/laravel-sift
```

Next, add the following to the `providers` array in config/app.php
```php
Suth\LaravelSift\SiftServiceProvider::class,
```

Register the facade by adding the following line to the `aliases` array in config/app.php
```php
'SiftScience' => Suth\LaravelSift\Facades\SiftScience::class,
```

## Config

You can publish the configuration file using the following artisan command
```
php artisan vendor:publish --provider="Suth\LaravelSift\SiftServiceProvider"
```

The default config file will check for a `SIFT_API_KEY` and `SIFT_JAVASCRIPT_KEY` in your .env file.

## Usage

To add the JavaScript snippet to your pages, include the following line immediately after the opening body tag in your master blade template:

```php
@include('sift::snippet')
```

This will track user interaction with your site using a session ID as well as the user's email when authenticated. For more information on the JavaScript snippet itself, consult the [Sift Science documentation](https://siftscience.com/developers/docs/javascript/javascript-api).

## Tracking Events

By default the package tracks successful and failed logins as well as logouts.
