# Kopi List [![Build Status](https://travis-ci.org/soramugi/kopilist.png?branch=master)](https://travis-ci.org/soramugi/kopilist)

みんなのやりたい事リスト

# Setting

    git clone https://github.com/soramugi/kopilist.git /var/www/kopilist/
    cd /var/www/kopilist/protected/
    composer install

apache DocumentRoot
`DocumentRoot "/var/www/kopilist/"`

# Testing

    cd /var/www/kopilist/protected/tests
    ../vendor/bin/phpunit
