<?php
// User object
class User{
 
	// database connection and table name
	private $conn;
	private $table_name = "users";

	// object properties
	public $id;
	public $firstname;
	public $lastname;
	public $email;
	public $password;

	// constructor
	public function __construct()
	{}
 
}
