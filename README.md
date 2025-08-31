# Description

Sorts Filament navigation items in the sidebar. Super light weight and easy to use.

## Installation

You can install the package via composer:

```bash
composer require harman/filament-nav-sort
```

and publish the config file using the following command:

```bash
php artisan vendor:publish --provider="Harman\FilamentNavSort\FilamentNavSortServiceProvider"
```

## Usage

### Step 1

Add **HasNavSort** trait to all the filament resources and pages.

```php
use Harman\FilamentNavSort\HasNavSort;
class UserResource extends Resource
{
    use HasNavSort;
//--
```

```php
use Harman\FilamentNavSort\HasNavSort;
class Settings extends Page
{
    use HasNavSort;
//--
```

### Step 2

Create an Enum anywhere in your laravel project.
For Example : You can create a php file in the directory : "App &rarr; Filament &rarr; Enums &rarr; NavSortEnum.php"
and create an enum like this:

```php
namespace App\Filament\Enums;
enum NavSortEnum
{
    case UserResource;
    case Settings;
    case News;
    case TestPage;
    //--
    //Add all the resources and pages classnames here
}
```

use classname of resource or page as the case. \
For example (For Resources) : UserResource, PostResource, CategoryResource etc. \
For example (For Pages) : Settings, Author, AuthorPage, TestPage, SettingsPage etc. \

**Important:** Arrange the cases in the enum in the order you want them to appear in the navigation.

### Step 3

Open config/filament-nav-sort.php and add the enum to the config file.

```php
use App\Filament\Enums\NavSortEnum;
return [
    'enum' => [
        NavSortEnum::class
    ]
];
```

OR

```php
return [
    'enum' => [
        App\Filament\Enums\NavSortEnum::class
    ]
];
```

[//]: # (## Changelog)

[//]: # ()

[//]: # (Please see [CHANGELOG]&#40;CHANGELOG.md&#41; for more information on what has changed recently.)


[//]: # (## Security Vulnerabilities)

[//]: # ()

[//]: # (Please review [our security policy]&#40;../../security/policy&#41; on how to report security vulnerabilities.)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
