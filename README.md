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

### Customizing the Sift User ID
By default the package uses the [getAuthIdentifier()](https://github.com/laravel/framework/blob/5.2/src/Illuminate/Contracts/Auth/Authenticatable.php#L19) method to get an identifier (the user ID in most cases) for a user when tracking auth events. This value can be customized by adding a `getSiftId()` method to your user model that will return the value you want to track. This is useful if you don't want to expose your user IDs (the value is visible in the JavaScript snippet) or have another value you'd like to use. Keep in mind that using email addresses (or any other value that may change) may not be a good idea because you will lose your reference to the user in Sift if the value changes.

It is recommended that you use `SiftScience::getUserId($user)` to get a user's Sift ID when reporting your own events, as this is the method used internally. The `$user` arg is optional and will default to the currently authenticated user. It currently uses the value from the previously mentioned `getSiftId()` method and will fall back to `getAuthIdentifier()`.

If you are customizing your identifier be aware that if you change it in the future, another user will be created in Sift and their score may be impacted. Also be sure to check out the [allowed characters](https://support.siftscience.com/hc/en-us/articles/202116248-What-characters-can-I-use-in-my-User-ID-)).

### Tracking Events
By default the package tracks successful and failed logins as well as logouts, but you'll probably want to track other actions like transactions.

To track events, you'll want to interact with the SiftClient class, which can be accessed as shown below:
```php
// Import the facade
use SiftScience;

// Returns the SiftClient class
SiftScience::client();

// Track an event
SiftScience::client()->track('$transaction', [
    '$user_id'          => SiftScience::getUserId(),
    '$amount'           => 1000000,
    '$currency_code'    => 'USD',
    '$user_email'       => $user->email,
    '$transaction_type' => '$sale',
    '$transaction_status' => '$success',
    '$session_id'       => SiftScience::getSessionId(),
]);
```

In the example above you'll notice `SiftScience::getSessionId()`. This gets an identifier stored in the current session using the key `'sift_session_id'`. You can also pass a session store as an argument for situations (like queues) where there is not a current session.

For more on how to use the SiftClient class, consult the [sift-php documentation](https://github.com/SiftScience/sift-php) and the [events API reference](https://siftscience.com/developers/docs/php/events-api/overview).

### Queues
You may want to use a queue to track certain events to avoid slowing down your application. The built-in support for auth event tracking uses the queue, but as of now you will have to implement queueing yourself. Suggestions are welcome for an elegant way of adding queue support directly to this package.
