<?php
// show error reporting - for dev only
error_reporting(E_ALL);
 
// set your default time-zone
date_default_timezone_set('Europe/London');
 
// variables used for jwt
$key = "example_key";
$iss = "http://example.org";
$aud = "http://example.com";
$iat = 1356999524;
$nbf = 1357000000;


