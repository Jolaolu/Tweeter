# Laravel Twitter API

This is the Yulo store backend.


## Installation
To install, clone the repository to your preferred location on your machine:

```
$ git clone git@github.com:Jolaolu/Tweeter.git tweeter
```

Next, `cd` to the directory of the tweeter project.

```
$ cd tweeter
```

Make a copy of the `.env.example` file and name it `.env`

```
$ cp .env.example .env
```

Add your twitter tokens and consumer keys generated from your developer account app in the `.env` file

```
TWITTER_CONSUMER_KEY = xxxxxx
TWITTER_CONSUMER_SECRET = xxxxx
TWITTER_ACCESS_TOKEN = xxxx
TWITTER_ACCESS_TOKEN_SECRET = xxxx
```

Generate a new application key using `artisan`

```
$ php artisan key:generate
```

Next, install the dependencies for the project using the following command:

```
$ composer install

```

Serve the project using `artisan`

```
$ php artisan serve
```

Then check it on http://localhost:8000

## Contributing


