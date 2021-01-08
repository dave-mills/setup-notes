# VS Code Setup
these notes are for my current VS code set up – including mainly PHP/Laraval development work with some web front-end and general text editing capabilities.

## Extensions to Install

**Syntax Highlighting / Language Support**

- DotENV
- Python
- R
- vue

**Autocompletion / Intellisense**

- PHP Intelephense
- Laravel Extra Intellisense
- PHP Namespace Resolver
- Auto Close Tag
- Auto Rename Tag

Note - to get the full intelephense working for a Laravel project, you should setup laravel-ide-helper for the project:
 - `composer require barryvdh/laravel-ide-helper --dev`
 - `php artisan ide-helper:generate`
 - `php artisan ide-helper:models` (select no to not add all the helper text to the individual model files)
 - `php artisan ide-helper:meta`


**Shortcuts / Snippets etc**
- PHP Constructor
- PHP DocBlocker
- Emmet Live

**Formatting & Linting**
- Laravel Blade Spacer
- PHP cs fixer
- ESLint
- SCSS Formatter


### General Utility

- File Utils
- file-icons
- Git Graph
- change-case
- Text Pastry
- Markdown All in One

## Setup Autoformatters

### PHP-CS Fixer
I recommend installing via composer:
 -  `composer global require friendsofphp/php-cs-fixer`
 - ensure composer folder is in your path (however that works in your OS!)
 
### ESLint
Install via npm or yarn. I install globally (`npm i -g eslint`) as I want to use it in all my projects. I have a global .eslintrc file (placed in my home user folder) with standard settings. If a specific project needs different settings, that can be overridden by adding a .eslintrc file into the project root.

### Formatter / Linter Settings:
I recommend defining a 'global' settings file for both PHP-CS Fixer and ESLint. This way, you always have your standard settings available, and you can override them for specific projects if needed by adding a settings file into the project root. 

My settings are here:

 - PHP-CS: https://github.com/dave-mills/dotfiles/blob/master/.php_cs
 - ESLint: https://github.com/dave-mills/dotfiles/blob/master/.eslintrc
 
 Put these into your user home folder. Works on Mac, hopefully works on Windows... (haven't tested).
 
## Setup Settings:
My custom settings are in this folder for reference. Below are the specific settings I recommend trying for yourself (copy/overwite these keys in your settings.json user file)
 
 - Set files to autosave: `"files.autoSave": "onFocusChange",`
 - Keep your line ends tidy:  `"files.trimTrailingWhitespace": true,`
 - Run auto formatting and PHP CS Fixer automatically on save. This is very important as both the PHP CS Fixer and other auto formatting tools (SCSS Formatter, ESLint) are useful to ensure a consistent formatting of code using common standards.
 
```
"php-cs-fixer.onsave": true,
"editor.formatOnSave": true,
```

- A few other important settings for php-cs-fixer specically. I found that I had to use the **absolute** path for the php-cs-fixer.executablePath and config files: 

```
"php-cs-fixer.autoFixBySemicolon": true,

"[php]": {
    "editor.defaultFormatter": "junstyle.php-cs-fixer"
},
"php-cs-fixer.executablePath": "/Users/dave/.composer/vendor/bin/php-cs-fixer",
"php-cs-fixer.config": "/Users/dave/.php_cs",
```
