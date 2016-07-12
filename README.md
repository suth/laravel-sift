# Laravel Sift
A Laravel 5 package for Sift Science

## Installation

Install the package using Composer

`composer require suth/laravel-sift`

Next, add the following to the `providers` array in config/app.php

`Suth\LaravelSift\SiftServiceProvider::class,`

Register the facade by adding the following line to the `aliases` array in config/app.php

`'SiftScience' => Suth\LaravelSift\Facades\SiftScience::class,`

## Config

You can publish the configuration file using the following artisan command

`php artisan vendor:publish --provider="Suth\LaravelSift\SiftServiceProvider"`

The default config file will check for a `SIFT_API_KEY` and `SIFT_JAVASCRIPT_KEY` in your .env file.
