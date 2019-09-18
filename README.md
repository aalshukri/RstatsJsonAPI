# RstatsJsonAPI
API wrapper for R to allow JSON data exchange written in PHP.


## File Structure

```
.application/
+- api/ 		Main folder for public accessable api endpoints.
|  +-- v0.1/		Can use folder for versions and updates.
|    +--- index.php 
|    +--- login.php 
+- libs/		Supporting libaries for API functionality
|  +-- jwt/		JWT library for token and authentication.
+- objects/		classes to support main functionality of the API.
|  +-- User.php 
|  +-- Database.php 
+- config/
|  +-- core.php 	Common settings and variables.
|  +-- database.php	Setting for connecting to the database.
```

## Docker Dev Environment

#### Web Server

Start local webserver

> docker-compose up -d --build

Iniital setup

> chmod -R 755 www
> chown <user> www
> chmod 755 <filename>

Web files are in directory 'www/' access at: http://localhost/

To stop web server

> docker-compose stop


#### Database 

PhpMyAdmin

User: root, password: docker

db: db_runwaytest

http://localhost:8080/index.php


## Example

http://localhost/application/api/v0.1/login



