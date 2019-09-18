<?php
// required headers
header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 

// class imports
include_once '../../../objects/database.php';
include_once '../../../objects/user.php';
include_once '../../../config/core.php';

// instantiate user object
$user = new User($db);

// Get posted data
//   example { "email" : "test@test.com", "password" : "555" }
$data = json_decode(file_get_contents("php://input"));
 
// set product property values
$user->email = $data->email;

// check if user email exists
$userEmailExists = $user->emailExists();

if( $userEmailExists )
{
	// set response code
	http_response_code(200);

	// generate jwt
	echo json_encode(
	    array(
		"message" => "Successful login.",
		"jwt" => "ExAmPlEJwTrEsPoNcEcOdE"
	    )
	);
}
else
{
	// set response code
	http_response_code(401);

	// tell the user login failed
	echo json_encode(array("message" => "Login failed."));
}


