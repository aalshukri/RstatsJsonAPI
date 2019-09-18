# RstatsJsonAPI
API wrapper for R to allow JSON data exchange written in PHP.


## Dev

### Web Server

Start local webserver

> docker-compose up -d --build

Iniital setup

> chmod -R 755 www
> chown <user> www
> chmod 755 <filename>

Web files are in directory 'www/' access at: http://localhost/

To stop web server

> docker-compose stop


### Database 

PhpMyAdmin

User: root, password: docker

db: db_runwaytest

http://localhost:8080/index.php

