#Setup Localhost for PHP based development (WordPress, Moodle etc)

It's often good to do development on your local machine, before testing on the server environment.

Things needed:

- Apache
- PHP (7.0 at least)
- mySQL
- Composer
- Node / NPM
- Yarn




### Windows
**Composer**: Download the .exe file and run it.
(Install Composer for Windows)[https://getcomposer.org/doc/00-intro.md#using-the-installer]

**Yarn**
(Download and install node and npm)[https://nodejs.org/en/]
(Download and install Yarn)[https://yarnpkg.com/lang/en/docs/install/#windows-stable]

### Mac
I use homebrew to install a lot of dependancies.

MacOS has an apache server and PHP bundled in, but I override these with versions installed through homebrew - mainly to get more control over which version of things I'm using.

**Composer**:
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

**

1. Clone this repository into your localhost webroot.
2. 