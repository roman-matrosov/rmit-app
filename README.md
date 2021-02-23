# Symfony RMIT App example

### Setting up application
1) Clone app:<br/>
``git clone https://github.com/roman-matrosov/rmit-app.git``
2) Go to docker dir:<br/>
``cd rmit-app/docker``
3) Build: <br/>
``docker-compose build``
4) Install dependencies: <br/>
``docker-compose run rmit-php-fpm composer install``
5) Apply migrations: <br/>
``docker-compose run rmit-php-fpm php bin/console doctrine:migrations:migrate``
5) Load fixtures: <br/>
``docker-compose run rmit-php-fpm php bin/console doctrine:fixtures:load``
6) Finally start all services: <br/>
``docker-compose up``
7) Finally you can see results by opening url: <br/>
``http://127.0.0.1:815``
   
### Elasticsearch
* Symfony Elastica lib has listener, that updates/inserts/deletes all records in elasticsearch by itself.
* All indexes are set up in:
``config/packages/framework``
  

### Note
This is basic Symfony app setup.<br/>
All Controllers/Entities/Templates were created by builtin generator with some modifications.

### Working example
``http://rmit.matrosov.eu``