Symfony 2.0 Project Bootstrapping
=================================

1. Install composer:

    curl -s http://getcomposer.org/installer | php

2. Install the vendor libraries by running composer:

    php composer.phar --verbose install

3. Setup a VirtualHost with the following configuration (modify as needed):

    <VirtualHost *:80>
        
        ServerName project.symfony.local
        DocumentRoot "/Users/masud/Sites/personal/SymfonyBootstrap/web"
        
        <Directory "/Users/masud/Sites/personal/SymfonyBootstrap/web">
             Options Indexes FollowSymLinks MultiViews
             AllowOverride All
             Allow from All
        </Directory>
        
    </VirtualHost>

4. Create a copy of app/config/parameter.yml.dist to app/config/parameter.yml

5. Update all the required configs.

6. Run the following commands:

    php app/console doctrine:database:create
    chmod -R 0777 app/cache

6. Enjoy!
