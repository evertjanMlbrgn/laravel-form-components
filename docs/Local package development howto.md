# How to create / develop a laravel package locally in existing project

## Create a folder

Create a new folder called "packages" in the root laravel folder

## Clone package repository

- Go to the terminal and go to the "packages" folder
- clone the package e.g. git clone git@github.com:MLBRGN/laravel-form-components.git

## register the package in composer.json

open composer.json

add 

```json
"repositories": [
    {
        "type": "path",
        "url": "./packages/laravel-form-components",
        "options": {
            "symlink": true
        }
    }
],
```

and add the package name to the "require" object

```json
"require": {
   "...": '..."
    "mlbrgn/laravel-form-components": "@dev",
    "...": "..."
},
```

# Composer install

run composer install

```shell
composer install
```
# Updating package from within other project

Changes made from withing the packages folder can be commited separately from the main project
PHPStorm automatically shows it as a separate repository.
