# RstatsJsonAPI
API wrapper for R to allow JSON data exchange written in PHP using JWT.

## Overview

I have created a beta version of the PHP API wrapper for R. I have created a productxy application for this particular test case.

The r script, which is the most interesting part of this API, 
runs as a standard r script does. The input variables are simply passed via the command line,
which is invoked by the PHP script. 

The r script for productxy application can be seen here
https://github.com/aalshukri/RstatsJsonAPI/blob/master/www/application/objects/productxy.r
Input params x and y are simply parsed from input arguments.


In order to access the API, you first need a valid email address and password, 
which can be checked against a db (in this test version, we simply return true, with no db checks).
The email and password request is sent to http://localhost/application/api/v0.1/login (see below for details) and returns a token.

This token can then be used to access the service provided by the API. In this case, productxy.
The token, along with variables x and y, is send to http://localhost/application/api/v0.1/productxy
a value for z is retuned, which is calculated x*y.



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


#### Connect to container

docker exec -it dev_webserver_1 /bin/bash


## Example

1.   http://localhost/application/api/v0.1/login
2.   http://localhost/application/api/v0.1/productxy

### Login

Send a request to login to get JWT token for user (using email)

curl --header "Content-Type: application/json" \
  --request POST \
  --data '{"email":"xyz","password":"xyz"}' \
  http://localhost/application/api/v0.1/login/

This will either return 
 1. The JWT token for the user or
 2. an error message if user not exists or
 3. an message saying the email was not supplied.


The JWT token for the user

{"message":"Successful login.","jwt":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLm9yZyIsImF1ZCI6Imh0dHA6XC9cL2V4YW1wbGUuY29tIiwiaWF0IjoxMzU2OTk5NTI0LCJuYmYiOjEzNTcwMDAwMDAsImRhdGEiOnsiaWQiOm51bGwsImZpcnN0bmFtZSI6bnVsbCwibGFzdG5hbWUiOm51bGwsImVtYWlsIjoieHl6In19.nLxjkzdASI4dmpQAXY27o-piFQBBrHTbOd9rHHJ1ez8"}

Error message if user not exists

{"message":"Login failed."}

Message saying the email was not supplied.

{"message":"email not supplied."}


### Productxy

http://localhost/application/api/v0.1/productxy

Send a request to the productxy endpoint to get the response (x*y=z).

curl --header "Content-Type: application/json" \
  --request POST \
  --data '{"x":"10", "y":"20", "jwt":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLm9yZyIsImF1ZCI6Imh0dHA6XC9cL2V4YW1wbGUuY29tIiwiaWF0IjoxMzU2OTk5NTI0LCJuYmYiOjEzNTcwMDAwMDAsImRhdGEiOnsiaWQiOm51bGwsImZpcnN0bmFtZSI6bnVsbCwibGFzdG5hbWUiOm51bGwsImVtYWlsIjoieHl6In19.nLxjkzdASI4dmpQAXY27o-piFQBBrHTbOd9rHHJ1ez8"}' \
  http://localhost/application/api/v0.1/productxy/

Response

{"message":"Access granted.","data":{"id":null,"firstname":null,"lastname":null,"email":"xyz"},"z":200}

The API will return the product of x y and return z.


