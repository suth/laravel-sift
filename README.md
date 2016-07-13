# Laravel Sift

A [Laravel 5](https://laravel.com/) package for [Sift Science](https://siftscience.com/).

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

### JavaScript Snippet
To add the JavaScript snippet to your pages, include the following line immediately after the opening body tag in your master blade template:

```php
@include('sift::snippet')
```

This will track user interaction with your site using a session ID as well as the user's email when authenticated. For more information on the JavaScript snippet itself, consult the [Sift Science documentation](https://siftscience.com/developers/docs/javascript/javascript-api).

### Tracking Events
By default the package tracks successful and failed logins as well as logouts, but you'll probably want to track other actions like transactions.

To track events, you'll want to interact with the SiftClient class, which can be accessed as shown below:
```php
// Import the facade
use SiftScience;

// Returns the SiftClient class
SiftScience::client();

// Track an event
SiftScience::client()->track('$transaction', $properties);
```

For more on how to use the SiftClient class, consult the [sift-php documentation](https://github.com/SiftScience/sift-php) and the [events API reference](https://siftscience.com/developers/docs/php/events-api/overview).

You may want to use a queue to track certain events to avoid slowing down your application. The built-in support for auth event tracking uses the queue, but as of now you will have to implement queueing yourself. Suggestions are welcome for an elegant way of adding queue support directly to this package.
