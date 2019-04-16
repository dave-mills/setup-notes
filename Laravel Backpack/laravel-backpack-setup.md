# Setup for a 'Standard' (i.e. Great! ) Laravel Backpack Platform

## Basic Installation
Setup new laravel site and pull in the core dependancies using Composer:
```
laravel new app-name
cd app-name
composer require backpack/crud
php artisan backpack:base:install
php artisan backpack:crud:install
```
>Say no to the 'elfinder' option, unless you *really* want to expose your filesystem to users.


## Setup Authentication with Azure
Tools for Stats4SD staff should use the Laravel Socialite plugin, along with the Microsoft Azure driver.
(These notes probably work with any other Socialite provider, but I've only tested fully with Azure...)

1. Install the Laravel Socialite library and Azure provider:
```
composer require socialiteproviders/microsoft-azure
```

2. Find or create the Azure App to go with the platform.
 - For Development, use the **Stats4SD Development Auth** application. 
 - This app has a callback url added at `localhost:8000/login/callback`. So, if you're using the built-in php server (with `php artisan serve`), then you don't need to add a custom callback.
 - For other setups, add the appropriate callback url to the app.
 - Create a new secret key (or copy from Dashlane).

3. Add the details to the .env file:
```
AZURE_KEY=*app-id*
AZURE_SECRET=*app-secret*
AZURE_REDIRECT_URI=*redirect-url*
```

4. Add the details to the config/services.php file, so they get correctly cached as you move into production:
```
    'azure' => [
        'client_id' => env('AZURE_KEY'),
        'client_secret' => env('AZURE_SECRET'),
        'redirect' => env('AZURE_REDIRECT_URI')
    ],
```

5. Setup the Socialite Driver Provider and event listener:
 - In `config/app.php`, Add the following line to the 'providers' array: `       \SocialiteProviders\Manager\ServiceProvider::class,`
 - In `app/Providers/EventServiceProvider.php`, add the following item to the `$listen` array:
```
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            // add your listeners (aka providers) here
            'SocialiteProviders\Azure\AzureExtendSocialite@handle',
        ],
```

6. Setup the Auth Controllers:
 - In `app/Http/Controllers/Auth`, delete everything except the LoginController.php.
 - Replace the contents of LoginController.php with the version from this folder.

7. Setup the login routes. Add the following routes to the `routes/web.php` file:
```
// Login route redirect user to the chosen external provider, and the callback route handles users returning from the external provider.
Route::get('login', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('login/callback', 'Auth\LoginController@handleProviderCallback');


/**
 * Specific redirects to replace default backpack authentication routes
 */
Route::get('admin/login',function(){
    return view('welcome');
});

Route::get('admin/logout',function(){
    return view('welcome');
});
```

8. Replace the resources/views/welcome.blade.php with the version from this folder.

9. Edit the users table migration file, to remove the 'password' field and ad an 'azure_id' field. 

DELETE: `$table->string('password');`
ADD: `$table->string('azure_id')->nullable();`

Then run a fresh migration. (If you don't want to run a fresh migration, for example you have live data, create a new migration to edit the users table);

10. Update the app/User.php model:
 - add `azure_id` to the `protected $fillable[]` array.

11. in `config/backpack/base.php`:
 - update the `guard` value to "web". E.g.: `'guard' => 'web',`.
 - update the `setup_auth_routes` to false. E.g.: `'setup_auth_routes' => false,`

>By default, Laravel Backpack is designed to use seperate authentication to the 'main' website. (It's designed to be an admin panel to an existing application). Updating this setting to 'web' will tell Backpack to use the same authentication as the main site.
>We also need to prevent backpack from trying to use it's own authentication routes, because we've already specified custom ones in the web.php routes file.

2. Remove the "change password" option from the default account management console:
 - place the `sidemenu.blade.php` file from this folder into `resources\views\vendor\backpack\base\inc\account\`.

>Make sure this folder structure is as written. All packages that have resource files (like blade templates, js, css etc) can be overriten in this way, by copying the file from the vendor folder into the resources/ folder in the appropriate subfolder. See the [backpack for laravel docs](https://backpackforlaravel.com/docs/3.5/base-about#layout-design) For information on where to find these template files, and where to put your custom versions.



