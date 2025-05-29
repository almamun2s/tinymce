# TinyMCE editor for laravel

> Support WYSIWYG editor in input fields


## Features

- [x] Support Laravel 11/12

- [x] WYSIWYG editor 
  
- [x] Works with laravel blade
  
- [x] React, VUE and Angular support are coming soon
  

## Installation

Add the following line to the `require` section of `composer.json`:

```json
{
    "require": {
        "almamun2s/tinymce": "1.*"
    }
}
```

OR

Require this package with composer:
```
composer require almamun2s/tinymce
```

Update your packages with ```composer update``` or install with ```composer install```.


## Publish Config

```
php artisan vendor:publish --provider="Almamun2s\\TinyMCE\\TinyMCEServiceProvider"
```

### TinyMCE WYSIWYG editor (version 7.9.1)

Edit ``frontend_framework`` in the ``config/tinymce.php`` config

file ``config/tinymce.php``

```php
<?php

    return [
        /**
         * API get on https://www.tiny.cloud/
         */
        'api_key' => env('TINY_MCE_API', 'no-api-key'),

        /**
         * Your frontend framework what you used to develop your website
         * By default it is laravel blade 
         * blade is available now
         * react, vue and angular are coming soon
         */
        'frontend_framework' => 'blade',
    ];

```


## Configuration

Add `TINY_MCE_API`  to **.env** file:

```
TINY_MCE_API=[your-api-key]
```

### Display WYSIWYG editor

```php
    {!! app('tinymce')->display() !!}
```
With your custom name 

```php
    {!! app('tinymce')->display(['name' => 'my-textarea']) !!}
```
Or, with your custom class 
```php
    {!! app('tinymce')->display(['class' => 'my-class']) !!}
```
Or, with your custom id 
```php
    {!! app('tinymce')->display(['id' => 'my-id']) !!}
```

And you can pass data attributes for sure 
```php
    {!! app('tinymce')->display(['name' => 'my-product-details'], ['price' => '200', 'quantity' => '15']) !!}
```


## Contribute

https://github.com/almamun2s/tinymce/pulls
