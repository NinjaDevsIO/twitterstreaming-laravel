# TwitterStreaming Laravel 5 Service Provider

We are now supporting **TwitterStreamingPHP** with Laravel 5 through a [Service Provider](https://laravel.com/docs/master/providers) :)

## Installation

This **TwitterStreamingPHP** Service Provider can be installed via [Composer](http://getcomposer.org/). Running the following command:

	composer require rbadillap/twitterstreaming-laravel
	
Now you should register the provider in the Laravel application in your `config/app.php` configuration file:

```php
'providers' => [
	// other service providers..
		
    TwitterStreaming\Laravel\TwitterStreamingServiceProvider::class
],

```

Also, add the `TwitterStreaming` facade in the `aliasses` array (located in the same file).

```php
'TwitterStreaming' => TwitterStreaming\Laravel\Facades\TwitterStreaming::class
```

And ready to use!

## Usage

[To understand how to use TwitterStreamingPHP please visit its documentation](https://github.com/TwitterStreamingPHP/twitterstreaming)

## Extras

Within this Service Package you will find some extra methods to simplify the way to work with **TwitterStreamingPHP** in Laravel. Let's take a look all of them:

### Simplified way to define the endpoints

Instead of define the endpoints using the `endpoint` method in **TwitterStreamingPHP** you can call some methods which injects the endpoint (and its types) directly. For example:

```php
// Instead of
(new Tracker)
    ->endpoint(Endpoints\PublicEndpoint::class, 'sample')

// You can call in Laravel
TwitterStreaming::publicSample()

// and continue with the rest of the code

```

All the methods to simplify the endpoints definitions listed here:

```php
publicFilter()
// alias of endpoint(Endpoints\PublicEndpoint::class, 'filter')
```

```php
publicSample()
// alias of endpoint(Endpoints\PublicEndpoint::class, 'sample')
```

```php
user()
// alias of endpoint(Endpoints\UserEndpoint::class)
```

### Integration with Filters module

Are you using [Filters module?](https://github.com/TwitterStreamingPHP/twitterstreaming-filters)

If no, well, you should :)

If yes, we have been integrated into the Laravel Service Provider.

The only thing that you need to use is require the package using composer:

	composer require rbadillap/twitterstreaming-filters

And use it without the need to register the new extension.

```php
// this is not necessary
->addExtension(Extensions\Filters::class)

// TwitterStreamingPHP detects automatically if the module are included with composer 
// and you can use filters method automatically

    ->filters(function ($filters) {
        return $filters
            // Use methods to filter tweets
            ->withoutRTs()
            ->withoutReplies()
            ->onlyFromAndroid();
    })

```

## How can I use it in Laravel
There is some ways, but if you wanna combine Laravel and TwitterStreamingPHP you can create your own command

`php artisan make:console TwitterTrack`

And put your logic to track tweets.

```php
        TwitterStreaming::publicFilter()
            ->parameters([
                'track' => '#realmadrid'
            ])
            ->filters(function ($filters) {
                return $filters
                    ->withoutRTs()
                    ->withoutReplies()
                    ->onlyFromAndroid();
            })
            ->track(function ($tweet) {
                print $tweet->text . ' (' . $tweet->source . ')' . PHP_EOL . PHP_EOL;
            });
```

Even better, you could dispatch a queue listener to store in database.

```php
        TwitterStreaming::publicFilter()
            ->parameters([
                'track' => '#realmadrid'
            ])
            ->filters(function ($filters) {
                return $filters
                    ->withoutRTs()
                    ->withoutReplies()
                    ->onlyFromAndroid();
            })
            ->track(function ($tweet) {
                // php artisan make:job YourLaravelJob
                $this->dispatch(new YourLaravelJob($tweet));
            });
```

## Contributing

Use the same workflow as many of the packages that we have here in Github.

 1. Fork the project.
 2. Create your feature branch with a related-issue name.
 3. Try to be clear with the code committed and follow the [PSR-2 Coding Style Guide](http://www.php-fig.org/psr/psr-2/).
 4. Run the tests (and create your new ones if necessary).
 5. Commit and push the branch.
 6. Create the Pull Request.

