## Setup for a brand new Ubuntu server
(for use with 18.04)


### Install Core Components

Sources:

- [digital ocean](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-ubuntu-18-04)
- [certbot](https://certbot.eff.org/lets-encrypt/ubuntubionic-nginx)


### Initial Installs

```bash

sudo apt-get install software-properties-common
sudo add-apt-repository universe
sudo add-apt-repository ppa:ondrej/php
sudo add-apt-repository ppa:certbot/certbo
sudo apt-get update
sudo apt-get install certbot zip unzip python-certbot-nginx nginx mysql-server php7.3-fpm php7.3-mysql php7.3 php7.3-fpm php7.3-cli php7.3-curl php7.3-mysql php7.3-sqlite3 php7.3-gd php7.3-xml php7.3-mbstring php7.3-common gcc make autoconf libc-dev pkg-config libmcrypt-dev npm supervisor -y
sudo mysql_secure_installation

```

### MySQL Secure Installation Questions:
- "Would you like to setup VALIDATE PASSWORD plugin?": n
- Enter new root password.
- remove anonymous users = y
- disallow root login remotely = y
- remove test database and access to it = y
- reload privilege tables now = y


### Setup MySQL Non-Root User
`sudo MySQL`

Create user for project and assign user all privileges on databases:

```

CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON 'username\_%' . * to 'username'@'localhost';
exit
```


### Setup Rmate - Sublime link (for nicer remote editing)
```
sudo wget -O /usr/local/bin/subl https://raw.github.com/aurora/rmate/master/rmate
sudo chmod +x /usr/local/bin/subl

```


### Setup Composer
`sudo subl ~/composer-install.sh`

copy in contents below:

```bash
#!/bin/sh

EXPECTED_SIGNATURE="$(wget -q -O - https://composer.github.io/installer.sig)"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
ACTUAL_SIGNATURE="$(php -r "echo hash_file('sha384', 'composer-setup.php');")"

if [ "$EXPECTED_SIGNATURE" != "$ACTUAL_SIGNATURE" ]
then
    >&2 echo 'ERROR: Invalid installer signature'
    rm composer-setup.php
    exit 1
fi

php composer-setup.php --quiet
RESULT=$?
rm composer-setup.php
exit $RESULT
```

then run it!

```
sudo chmod +x ~/composer-install.sh
sudo ~/composer-install.sh
sudo mv composer.phar /usr/local/bin/composer

```


```



### Setup Basic Nginx Stuff
`sudo subl /etc/nginx/sites-available/default`

Update to initial config file:

```nginx

server {
    listen 80 default_server;
    listen [::]:80 default_server;

    ## for Laravel - direct to /public. Might be different for other projects
    root /var/www/##project###/public;


    server_name example.stats4sdtest.online;
    index index.php index.html index.htm index.nginx-debian.html;

    location / {
            try_files $uri $uri/ /index.php$is_args$args;
    }

    location ~ \.php$ {
            try_files $uri /index.php = 404;
            fastcgi_pass unix:/run/php/php7.3-fpm.sock;
            fastcgi_index index.php;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            include fastcgi_params;
    }

    location = /favicon.ico { log_not_found off; access_log off; }
    location = /robots.txt { log_not_found off; access_log off; allow all; }
}

```

Check and deploy test:

```
sudo nginx -t
sudo systemctl reload nginx
sudo rm /var/www/html -r
sudo mkdir /var/www/example
echo "<?php phpinfo(); ?>" | sudo tee /var/www/example/index.php
```

go to example.stats4sdtest.online to check you see the phpinfo();

Secure with SSL:

```
sudo certbot --nginx
```

(for first time certbot setup)
- add support@stats4sd.org as email
- Agree to terms
- do not share email

(for any new domain)
- select domain by number (it finds domains from nginx config)
- say yes to redirect

## Setup Project

Replace test with github repo:

```
sudo rm /var/www/example -r`
sudo git clone https://github.com/path/to/project example
```

## Add Self to web user group and deal with permissions

`sudo usermod -a -G www-data #you#`


```
sudo chown www-data:www-data /var/www/example -R
sudo chmod 775 example
sudo find /var/www/example -type f -exec chmod 664 {} \;
sudo find /var/www/example -type d -exec chmod 775 {} \;
sudo chgrp -R www-data /var/www/example/storage /var/www/example/bootstrap/cache
sudo chmod -R ug+rwx /var/www/example/storage /var/www/example/bootstrap/cache
```

Now you should be able to do things like "composer install" without needing sudo. Much cleaner.


### For Laravel
```
composer install
npm i
npm run dev

sudo chown /var/www/example www-data:www-data -R


php artisan migrate
cp .env.example .env
subl .env
```

Put all needed things into the .env file

 - App name
 - App Url
 - Database config details
 - etc...

```
php artisan key:generate
```



