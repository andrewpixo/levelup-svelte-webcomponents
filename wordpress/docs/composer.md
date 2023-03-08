# Composer package management

The project used Bedrock as a foundation which in part converts Wordpress core and plugins into dependencies that can
be managed with Composer. Please reference this excellent
[Composer tips blog post](https://blog.martinhujer.cz/17-tips-for-using-composer-efficiently/)
for a handy quick reference to Composer best practices.

## Install a new Wordpress plugin

All plugins hosted on Wordpress.org have a WPackagist package. Github hosted plugins can be used as well but take
a little extra configuration.

Run each composer command in the proper directory. For WordPress related packages (WP core, plugins, etc.) this is the project root. For theme packages this is the theme root.

```bash
composer require "wpackagist-plugin/redirection"
composer require "wpackagist-plugin/redirection:5.0"
```

You can install developer packages that only load for developer environments by adding the `--dev` flag.

```bash
composer require "wpackagist-plugin/query-monitor" --dev
```

## Update packages

To update all packages based on the versioning rules.
```bash
composer update --with-dependencies
```

To update a single package and it's dependencies.
```bash
composer update "wpackagist-plugin/redirection" --with-dependencies
```

To check to see what packages have updates.
```bash
composer outdated
```

The composer lock files can easily create merge conflicts. The best way to deal with a merge conflict to the
`composer.lock` is to simply recreate it.

```bash
git checkout --theirs -- composer.lock
composer update --with-dependencies
```

## Custom repositories

Dependencies with custom repositories have to be updated in the `composer.json` file manually
before running `composer update`. Their version numbers are locked into the repository definition.

The packages that currently use custom repositories are paid plugins.
You can get the current version for these plugins by visiting their release pages.

* [Gravity Forms release notes](https://docs.gravityforms.com/gravityforms-change-log/)
* [ACF release notes](https://www.advancedcustomfields.com/changelog/)

Then update the version number in the repositiory definition like you see here.

```json
{
    "repositories": [
        {
            "type": "package",
            "package": {
                "name": "junaidbhura/gravityforms",
                "version": "<specific version number>",
                "type": "wordpress-plugin",
            }
            ]
        }
```

After you have updated the version number run

`composer outdated`

and you should see the new version show up in the list of outdated dependencies.

Then update all of the dependencies with ` composer update` or updated that
specific one by naming the package `composer update junaidbhura/gravityforms`.

## Manual installation and updates

Some paid plugins do not have a Composer friendly package. These need to be manually
updated and installed in the traditional way using the Wordpress UI or the WP-CLI methods.

To install a plugin this way you need to first add a `.gitignore` exception for it.

```bash
# .gitignore

# Don't ignore plugins that cannot be managed with Composer
!web/app/plugins/instagram-feed-pro
```
