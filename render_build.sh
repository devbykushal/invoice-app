#!/usr/bin/env bash

# Install Node.js dependencies
npm install
npm run build

# Install Composer dependencies
curl -sS https://getcomposer.org/installer | php
php composer.phar install --no-dev --optimize-autoloader
