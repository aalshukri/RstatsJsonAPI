<?php 
/**
 * API v0.1
 * Application
 * 2019-09-18 11:09:17 
 */

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// set response code - 200 OK
http_response_code(200);

// tell the user no products found
echo json_encode(
	array("message" => "test.")
);


