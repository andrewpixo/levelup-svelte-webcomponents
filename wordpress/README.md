# Wordpress Starter Kit project

This is a WordPress starter kit for [Pixo](https://pixotech.com) and can be used as a starting point for any new WordPress
project. It includes common features and functionality that we use in most projects and allows a developer to start
development within [just a few minutes](#markdown-header-project-setup).

## Development stack

This project makes heavy use of the following projects to modernize the Wordpress development stack.

### [Bedrock](https://roots.io/bedrock/)

Bedrock is a project that repackages WordPress into a new directory structure and provides the following features.

* A separate `web` root directory
* Composer dependency management
* Environment configuration framework

Read the [documentation](https://roots.io/docs/bedrock/master/installation/#getting-started) for more information.

### [Lumberjack](https://lumberjack.rareloop.com/)

The [Lumberjack](https://lumberjack.rareloop.com/) is a theme framework that provides utilities and an organizational structure for coding custom functionality.
Some of that functionality includes:

* [Timber](https://upstatement.com/timber/) for Twig templating and MVC viewmodel and controller support.
* Post type registration
* Menu registration
* A query builder
* [and much more](https://docs.lumberjack.rareloop.com/)


### ACF Builder
[ACF Builder](https://github.com/StoutLogic/acf-builder) is a toolkit for building Advanced Custom Fields field group configurations
in your project. It uses a set if chain-able methods to rapidly build out your author UI as well as the ability to
create re-usable field patterns.

### Docker

This project includes a Docker Compose configuration configured specifically for WordPress local development. It includes
the following features.

* PHP-FPM container with support for current and past versions
* Nginx container pre-configured for WordPress
* MariaDB container for the database
* [Mailhog](https://github.com/mailhog/MailHog) container for email testing
* PHPMyAdmin container for database management
* [Traefik](https://github.com/traefik/traefik) container for routing traffic by hostname on your local environment

## Fractal

[Fractal](https://fractal.build) is a pattern library tool for generating a static website that includes your theme
template patterns along with annotations, and other useful meta data.

USAGE: Every Twig template that is created should include a `[template-name].config.js` configuration file along-side it.
It should represent all the variations of that template so that the library becomes a useful reference for the designs.


## Project setup

### Requirements

- [Docker](https://www.docker.com/)
- Bash/Zsh

### Local setup

To set up your local environment run the setup script.

1. Run `bin/setup.sh`. This sets up the local Docker environment and Wordpress.

That is it! The setup script will tell you the url of your new site.

## Workflow

Each time you pull in other people's work you can run the local
sync script. This will update your environment by updating or installing any new dependencies and database migrations.
- `bin/sync-local.sh`

## Front-end stack

* Webpack is used in the theme directory to compile and process Stylus for CSS and ES6 Javascript.
* Stylus for the CSS pre-processor.

### Build & watch process

- `cd web/app/themes/custom`
- `npm run watch` to run the build and watch files
- `npm run dev` to run a development build
- `npm run build` to run a production build

## Documentation

For more documentation refer to the files in the [docs/](docs/) directory.



