# Software Installations

## Utility
- [1Password](https://1password.com/downloads/mac/)
- [Dropbox](https://www.dropbox.com/install)
- Better Touch Tool
- Karabiner Elements (Desktop only)
- Alfred
- Bartender
- 


## Work
- Sublime 3
- Sequel Pro
- Office365
- Chrome

## Comms
- WhatsApp

# Mac App Store
- 1Password
- Drafts
- Things 3
- Slack
- FCPX
- XCode

# CLI
Move .zshrc and .aliases into ~/ folder.


## Homebrew etc
```
/usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"

brew install php
brew services start php

brew install mysql@5.7
brew services start mysql@5.7

brew install youtube-dl


```


php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
mv composer.phar /usr/local/bin/composer

composer global require laravel/valet
valet install
