# Genesis Advanced
[![Packagist](https://img.shields.io/packagist/v/nicbeltramelli/genesis-advanced.svg?style=for-the-badge)](https://packagist.org/packages/nicbeltramelli/genesis-advanced)
[![Build Status](https://img.shields.io/travis/NicBeltramelli/genesis-advanced.svg?style=for-the-badge)](https://travis-ci.org/NicBeltramelli/genesis-advanced)


Genesis Advanced is a starter child theme for the Genesis Framework with a modern development workflow. 

Tested up to WordPress 5.2.1 and Genesis 3.0.3.


## Features

* Sass for stylesheets
* Modern JavaScript
* [Webpack](https://webpack.github.io/) for compiling assets, optimizing images, and concatenating and minifying files
* [Browsersync](http://www.browsersync.io/) for synchronized browser testing


## Requirements

Make sure all dependencies have been installed before moving on:

* [WordPress](https://wordpress.org/) >= 5.0
* [Genesis Framework](https://my.studiopress.com/themes/genesis/) >= 2.8.0
* [PHP](https://secure.php.net/manual/en/install.php) >= 7.1
* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/) >= 8.0.0
* [Yarn](https://yarnpkg.com/en/docs/install)


## Theme installation

Install Genesis Advanced using Composer from your WordPress themes directory (replace `your-theme-name` below with the name of your theme):

```shell
# @ app/themes/ or wp-content/themes/
$ composer create-project nicbeltramelli/genesis-advanced your-theme-name
```


## Theme structure

```shell
themes/your-theme-name/  # → Root of your child theme
├── .scripts/            # → Node scripts
├── assets/              # → Front-end assets
│   ├── config.json      # → Settings for compiled assets
│   ├── build/           # → Webpack and ESLint config
│   ├── fonts/           # → Theme fonts
│   ├── images/          # → Theme images
│   ├── scripts/         # → Theme JS
│   └── styles/          # → Theme stylesheets
├── config/              # → Theme configuration data
├── dist/                # → Built theme assets (never edit)
├── lib/                 # → Theme PHP library
│   ├── blocks/          # → Add support for Gutenberg blocks
│   ├── classes/         # → Theme classes
│   ├── structure/       # → Theme structure
│   ├── woocommerce/     # → WooCommerce PHP library
│   ├── admin.php        # → Adds the admin dashboard setting
│   ├── assets.php  	 # → Enqueue fonts, stylesheets and scripts
│   ├── body-classes.php # → Adds consistent classes to the body tag
│   ├── customize.php    # → Adds the Customizer addition
│   ├── defaults.php     # → Configures the default theme settings
│   ├── errors.php       # → Displays error messages
│   ├── extras.php       # → Custom functions
│   ├── helpers.php      # → Adds the required helper functions
│   ├── output.php       # → Adds the required CSS to the front-end
│   └── setup.php        # → Defines theme constants and features
├── node_modules/        # → Node.js packages (never edit)
├── page-templates/      # → Custom page templates
├── vendor/              # → Composer packages (never edit)
├── composer.json        # → Composer dependencies and scripts
├── composer.lock        # → Composer lock file (never edit)
├── front-page.php       # → Front page template
├── function.php         # → Includes the theme PHP library
├── package.json         # → Node.js dependencies and scripts
├── search.php           # → Search template
├── style.css            # → Theme meta informations
└── yarn.lock            # → Yarn lock file (never edit)
```


## Theme setup

1. Edit `lib/setup.php` to define child theme constants and features support
2. Edit `style.css` to define your theme meta information (name, URI, description, version, author)


## Theme development

1. Run `yarn` from the theme directory to install dependencies
2. Update `assets/config.json` settings:
  * `publicPath` should reflect your WordPress folder structure (`/wp-content/themes/your-theme-name` for non-[Bedrock](https://github.com/roots/bedrock) installs)
  * `devUrl` should reflect your local development hostname


### Build commands

* `yarn build` — Compiles and optimize the files in your assets directory
* `yarn build:production` — Compiles assets for production
* `yarn build:profile` — Outputs information for each step of the compilation
* `yarn start` — Compiles assets when file changes are made, starts Browsersync session
* `yarn rmdist` — Removes compiled assets
* `yarn lint` — Runs JavaScript and styles linter
* `yarn lint:scripts` — Runs JavaScript linter
* `yarn lint:styles` — Runs styles linter
* `yarn makepot` — Regenerates the `languages/genesis-advanced.pot` file
* `yarn zip` — Creates .zip package for production


### WordPress coding standard

* `composer phpcs` — Runs WordPress coding standards checks
* `composer phpcbf` — Fix php sniff violations automatically


### Front-end dependencies

 * [jquery.scrollTo](https://github.com/flesler/jquery.scrollTo)
 * [normalize-scss](https://github.com/JohnAlbin/normalize-scss)
 * [sass-mq](https://github.com/sass-mq/sass-mq)


## Credits

* [Genesis Sample Theme](https://github.com/studiopress/genesis-sample/)
* [Sage](https://github.com/roots/sage)