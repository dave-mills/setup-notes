# Software Installations

macapps.link: curl -s 'https://api.macapps.link/en/chrome-bettertouchtool-dropbox-drive-carboncopycloner-fantastical-sequelpro-sublime-espresso-postman-iterm-bartender-istatmenus-gemini-vlc-steam-plex-handbrake-skype-slack-whatsapp-discord' | sh


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
- Sequel Pro / TablePlus
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

brew install redis
ln -sfv /usr/local/opt/redis/*.plist ~/Library/LaunchAgents
launchctl load ~/Library/LaunchAgents/homebrew.mxcl.redis.plist

brew install youtube-dl

```

## Composer etc

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
mv composer.phar /usr/local/bin/composer

composer global require laravel/valet
valet install
```

## Other Stuff
SSH key:

`ssh-keygen`

Add key to Github.

Gcloud SDK:


