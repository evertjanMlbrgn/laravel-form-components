# Install GitHub dependency in composer

Open the project in which you want to include the form-components.  

## update composer.json

Add the following to composer.json

"repositories": [
{
"type": "vcs",
"url": "https://github.com/MLBRGN/laravel-form-components.git"
}
],

And add

"mlbrgn/laravel-form-components": "@dev", to the “require”  json object

After this your composer.json file will look something like this

```json
"license": "MIT",
"repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/MLBRGN/laravel-form-components.git"
    }
],
"require": {
"php": "^8.1",
"...":"...",
"...":"...",
"mlbrgn/laravel-form-components": "@dev",
},
```

## Run composer update 

``` shell
composer update
```

## When asked for a token

If asked for a token you need to create a GitHub personal token

### Create GitHub personal token
* Go to GitHub
* Click on profiel avatar and go to ” Settings”
* Go to “Developer Settings”
* Click on “Tokens (classic)”
* Generate new token (classic)
