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

1.   http://localhost/application/api/v0.1/login
2.   http://localhost/application/api/v0.1/productxy


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



http://localhost/application/api/v0.1/productxy

Send a request to the productxy endpoint to get the response (x*y=z).

curl --header "Content-Type: application/json" \
  --request POST \
  --data '{"x":"10", "y":"20", "jwt":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLm9yZyIsImF1ZCI6Imh0dHA6XC9cL2V4YW1wbGUuY29tIiwiaWF0IjoxMzU2OTk5NTI0LCJuYmYiOjEzNTcwMDAwMDAsImRhdGEiOnsiaWQiOm51bGwsImZpcnN0bmFtZSI6bnVsbCwibGFzdG5hbWUiOm51bGwsImVtYWlsIjoieHl6In19.nLxjkzdASI4dmpQAXY27o-piFQBBrHTbOd9rHHJ1ez8"}' \
  http://localhost/application/api/v0.1/productxy/

Response



