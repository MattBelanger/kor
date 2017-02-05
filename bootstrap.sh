#!/usr/bin/env bash

alias l='ls -la';

cd /var/www
sudo cp default /etc/apache2/sites-available
sudo /etc/init.d/apache2 restart
