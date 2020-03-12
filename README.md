# Bitly-laravel

A simple package to use bitly api effectively to short link, get full link 
and other features offered by bitly. 

For more information see [Bitly](https://bitly.com/)

## Requirements ##

Laravel 5.1 or later, minimum php version 7.0

## Installation ##

Installation is a quick 3 step process:

1. Download bitly-laravel using composer
2. Enable the package in app.php
3. Configure your Bitly credentials

Use the different methods offered in this package to access different 
bitly services.

### Step 1: Download laravel-bitly using composer

Add yeamin/bitly-laravel package for laravel by running the command:

```
composer require yeamin/bitly-laravel
```

### Step 2: Enable the package in app.php

Register the Service in: **config/app.php**. Add the below line inside providers array. One can find the provide array inside **config/app.php**

``` php
Yeamin\Bitly\BitlyServiceProvider::class,
````
Register the Bitly Facade in: **config/app.php** Add the below line inside 
aliases array.

```
'Bitly' => Yeamin\Bitly\Facade\Bitly::class,
```
This is a example where the Bitly facades will be added.
``` php
'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        ...
        'Bitly' => Yeamin\Bitly\Facade\Bitly::class,
````

### Step 3: Configure Bitly credentials

Run the following command.

```
php artisan vendor:publish --provider="Yeamin\Bitly\BitlyServiceProvider"
```

Add this in you **.env** file. One will need generic access token and 
enter the token in the place of **your_secret_bitly_access_token** inside .env
You can find the **generic access token** from here 
[Bitly Access Token](https://bitly.is/accesstoken).

```
BITLY_ACCESS_TOKEN=your_secret_bitly_access_token
```

Usage
-----

####To Get short URL:
( Do not forget to give http or https in the beginning of your url ) 

``` php
$url = app('bitly')->getShortUrl('https://www.google.com/'); // http://bit.ly/nHcn3
````

Or if you want to use facade, add this in your class after namespace declaration:

``` php
use Bitly;
```
Then you can use it directly by calling `Bitly::` like:
``` php
$url = Bitly::getShortUrl('https://www.google.com/'); // http://bit.ly/nHcn3
````
####To Expand URL:

``` php
$shortUrl = app('bitly')->getLongUrl('http://bit.ly/nHcn3'); // https://www.google.com/
````

Or if you want to use facade, add this in your class after namespace declaration:

``` php
use Bitly;
```
Then you can use it directly by calling `Bitly::` like:
``` php
$url = Bitly::getLongUrl('http://bit.ly/nHcn3'); // https://www.google.com/
````

